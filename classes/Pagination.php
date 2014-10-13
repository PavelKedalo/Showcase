<?php

    class Pagination
    {
        protected $id;//current page
        protected $startChar;//first page
        protected $prevChar;//previous page
        protected $nextChar;//next page
        protected $endChar;//last page

        public function __construct(
            $startChar = '&laquo;',//symbol '<<'
            $prevChar = '&lsaquo;',//symbol '<'
            $nextChar = '&rsaquo;',//symbol '>'
            $lastChar = '&raquo;'//symbol '>>'
        ) {

            $this->startChar = $startChar;
            $this->prevChar  = $prevChar;
            $this->nextChar  = $nextChar;
            $this->lastChar   = $lastChar;
        }

        public function getLinks(
            $countAllElements,//count all elements in this category
            $countElementsInThisPage,//count all elements in this page
            $startElements,//beginning number of output elements
            $linkLimit = 5,//count pages in chunk (chunk = array with pages)
            $controllerName,//controller name
            $varName = 'start'//get name of parameter, which is the count of output elements
        ) {

            //if count pages == 1 or elements is absent
            if ($countElementsInThisPage >= $countAllElements || $countElementsInThisPage == 0) {
                return NULL;
            }

            $pages = 0;//count pages in pagination
            $needChunk = 0;//index need chunk in this moment
            $page = array();//array with value and text value page
            $queryVars = array();//GET array
            $pagesArr = array();//array with $startElements
            $link = Url::getUrl().$controllerName;//url address for page

            //in $queryVars GET parameters
            parse_str($_SERVER['QUERY_STRING'], $queryVars ); //&$queryVars

            if(isset($queryVars[$varName])) {

                unset($queryVars[$varName]);//delete GET with parameter $startElements
            }
            unset($queryVars['route']);//delete GET['route'], because route is controllerName

            $link = $link.'?'.http_build_query( $queryVars );//site url with router parameters and GET params

            $pages = ceil( $countAllElements / $countElementsInThisPage );//count pages

            for( $i = 0; $i < $pages; $i++) {
                $pagesArr[$i+1] = $i * $countElementsInThisPage;
            }

            $allPages = array_chunk($pagesArr, $linkLimit, true);//divide the array into several arrays by $linkLimit elements

            $needChunk = $this->searchPage($allPages, $startElements);//search active chunk


            /** pages first and previous */
            if ($startElements > 1) {

                $page['value']['start'] = $link.'&'.$varName.'=0';
                $page['text']['start'] = $this->startChar;
                $page['value']['previous'] = $link.'&'.$varName.'='.($startElements - $countElementsInThisPage);
                $page['text']['previous'] = $this->prevChar;
            } else {

                $page['value']['start'] = '';
                $page['text']['start'] = $this->startChar;
                $page['value']['previous'] = '';
                $page['text']['previous'] = $this->prevChar;
            }

            /** 5 pages or less */
            foreach($allPages[$needChunk] AS $pageNum => $start)  {

                if( $start == $startElements  ) {//current page without url
                    $page['value']['pages'][] = '';
                    $page['text']['pages'][] = $pageNum;
                    continue;
                }
                $page['value']['pages'][] = $link.'&'.$varName.'='. $start;
                $page['text']['pages'][] = $pageNum;
            }

            /** pages next and last */
            if (($countAllElements - $countElementsInThisPage) >  $startElements) {

                $page['value']['next'] = $link.'&'.$varName.'='.($startElements + $countElementsInThisPage);
                $page['text']['next'] = $this->nextChar;
                $page['value']['last'] = $link.'&'.$varName.'='.array_pop(array_pop($allPages));
                $page['text']['last'] = $this->lastChar;
            } else {

                $page['value']['next'] = '';
                $page['text']['next'] = $this->nextChar;
                $page['value']['last'] = '';
                $page['text']['last'] = $this->lastChar;
            }

            return $page;//array with pagination parameters
        }

        /** search page in chunk */
        protected function searchPage(array $pagesList, $needPage) {

            foreach( $pagesList AS $chunk => $pages  ) {

                if(in_array($needPage, $pages)) {

                    return $chunk;
                }
            }
            return 0;
        }
    }