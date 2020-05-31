<?php
    class Paginator{
        private $totalUsers;
        private $totalUsersPerPage = 1;
        private $pageDisplay = 3;
        private $totalPage;
        private $currentPage;
        private $qus;
        private $url;
        private $countElements;

        public function __construct($totalUsers, $totalUsersPerPage = 1, $pageDisplay =5, $currentPage){
            $this->totalUsers        = $totalUsers;
            $this->totalUsersPerPage = $totalUsersPerPage;
            $this->currentPage       = $currentPage;
            $this->pageDisplay       = $pageDisplay;
            $this->totalPage         = ceil($totalUsers/$totalUsersPerPage);
            $this->qus               = strrpos($_SERVER['REQUEST_URI'],"?")? '&' : '?';
            $this->url               = $_SERVER['REQUEST_URI'];
            $this->countElements     = $this->totalUsersPerPage;

            // Delete previous ?page=
            if(!strrpos($this->url ,''.$this->qus.'page=') === false){
                $url= substr($this->url ,0,strpos($this->url ,''.$this->qus.'page='));
                $this->url = $url;
            }
            // count element
            if($this->totalUsers < $this->totalUsersPerPage){
                $this->countElements= $totalUsers;
            }elseif($this->currentPage == $this->totalPage){
                $this->countElements = $this->totalUsers%$this->totalUsersPerPage;
            }else{
                $this->countElements = $this->totalUsersPerPage;
            }
        }
        public function getter(){
            $display = $this->pageDisplay;
            if($this->pageDisplay > $this->totalPage){
                $display = $this->totalPage;
            }
            return array(
                'totalUsers'=> $this->totalUsers,
                'totalUsersPerPage' => $this->totalUsersPerPage,
                'currentPage' => $this->currentPage,
                'totalPage' => $this->totalPage,
                'pageDisplay' => $display,
                'countElements' => $this->countElements
            );
        }

        public function showPage(){
            $html = '';
            $start='';
            $prev='';
            $next='';
            $end='';

            // If there's more than 1 page, show start, prev, next, end
            if($this->totalPage > 1){
                $start = '<li>Start</li>';
                $prev = '<li>Previous</li>';
                if($this->currentPage > 1){
                    $start = '<li><a href="'.$this->url.''.$this->qus.'page=1">Start</a></li>';
                    $prev = '<li><a href="'.$this->url.''.$this->qus.'page='.($this->currentPage-1).'">Previous</a></li>';
                }
                $next = '<li>Next</li>';
                $end = '<li>End</li>';
                if($this->currentPage < $this->totalPage){
                    $next 	= '<li><a href="'.$this->url.''.$this->qus.'page='.($this->currentPage+1).'">Next</a></li>';
                    $end 	= '<li><a href="'.$this->url.''.$this->qus.'page='.$this->totalPage.'">End</a></li>';
                }
            }
            $startPage = '';
            $endPage ='';
            
            if($this->currentPage ==1 && $this->totalPage >= $this->pageDisplay){
                $startPage = 1;
                $endPage = $this->pageDisplay;
            } elseif($this->currentPage == $this->totalPage && $this->totalPage >= $this->pageDisplay){
                $endPage = $this->totalPage;
                $startPage = $this->totalPage - $this->pageDisplay+1;
            } elseif($this->totalPage <= $this->pageDisplay){
                $endPage = $this->totalPage;
                $startPage = 1;
            }else{
                if($this->pageDisplay % 2 == 0){
                    $startPage = $this->currentPage - $this->pageDisplay/2 +1;
                    $endPage= $this->currentPage + $this->pageDisplay/2;
                } else{
                    $startPage = $this->currentPage - ($this->pageDisplay-1)/2;
                    $endPage = $this->currentPage + ($this->pageDisplay-1)/2;
                }
            }

            $listPages = '';

            if($this->totalPage > 1){
                for($i = $startPage; $i <= $endPage; $i++){
                    if($i == $this->currentPage){
                        $listPages .= '<li style="color:green;">'.$i.'</a>';
                    } else{
                        $listPages .= '<li><a href="'.$this->url.''.$this->qus.'page='.$i.'">'.$i.'</a>';
                    }
                }
            }else{
                $listPages= "<li><a href='#'>1</a>";
            }
           
            $html = "<ul>" . $start .$prev .$listPages .$next .$end . "</ul>";
            return $html;
        }  
    }
?>