<?php
$limit=2;$first=0;
$filter=[];$page=1;

$pagecnt=0;

if(isset($_REQUEST['search']) && !empty($_REQUEST['search'])){
	$filter[] = "`ph_name` LIKE '".$_REQUEST['search']."%' ";

}
if(isset($_REQUEST['page']) ){
	$first=$limit*($_REQUEST['page']-1);

}

$where = '';
if ($filter) {
    $where = ' WHERE ' . implode(' AND ', $filter);
}

$sql="SELECT `ph`.* FROM `ph` ".$where."  ORDER BY `ph`.`ph_id` LIMIT ".$first.",".$limit;
$rows = $this->db->queryRows($sql);

if(!$rows){
$where='';                                                                                              //<===
$sql="SELECT `ph`.* FROM `ph` ORDER BY `ph`.`ph_id` LIMIT ".$first.",".$limit;

}
$rows = $this->db->queryRows($sql);


$c = $this->db->queryOne("SELECT COUNT(*) as 'count' FROM `ph` ". $where);              //
 $rowscount = $c['count'];

 $pagecnt= ceil($rowscount/ $limit) ;

 if(isset($_REQUEST['page'])  && is_numeric($_REQUEST['page']) && $_REQUEST['page']>0 ){
      $page=$_REQUEST['page'] ;
 }


if($page>$pagecnt)$page=$pagecnt;

echo json_encode([
  'pagination'=>[
         'rowscount'=>(int)$rowscount,
          'limit'=>$limit,
           'page'=>$page,
           'pagecnt'=>$pagecnt,
           'first'=>$first

    ],
   'rows'=> $rows
]);