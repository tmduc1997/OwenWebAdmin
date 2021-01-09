<?php
  include ("Connect.php");
  $page=$_GET['page'];
  $Search=$_POST['txtSearch'];
  $space=8;
  $limit =($page-1)*$space;
  $array_Search=array();
  $query="SELECT * FROM product WHERE Name LIKE '%$Search%' AND Display=1 ORDER BY RAND() LIMIT $limit,$space";
  $data = mysqli_query($connect,$query);
  while ($row = mysqli_fetch_assoc($data)) {
    array_push($array_Search,new product(
      $row['Product_ID'],
      $row['Name'],
      $row['Image'],
      $row['Description'],
      $row['Price'],
      $row['ProCat_ID'],
      $row['New'],
      $row['Top'],
      $row['Freeship'],
      $row['Available']
    ));
  }

  echo json_encode($array_Search);

  class product{
    function product($Product_ID,$Name,$Image,$Description,$Price,$ProCat_ID,$New,$Top,$Freeship,$Available){
      $this->Product_ID=$Product_ID;
      $this->Name=$Name;
      $this->Image=$Image;
      $this->Description=$Description;
      $this->Price=$Price;
      $this->ProCat_ID=$ProCat_ID;
      $this->New=$New;
      $this->Top=$Top;
      $this->Freeship=$Freeship;
      $this->Available=$Available;
    }
  }
 ?>
