<?php
session_start();
include_once "dbconnect.php" ; 
$search = $_GET ['req'];
$search = filter_var($search, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
$search_exploded = explode (" ", $search);
 
$x = "";
$construct = "";  
$result = '';
$pagination = '';
    
foreach($search_exploded as $search_each)
{
$x++;
if($x==1)
$construct .="name LIKE '%{$search_each}%'";
else
$construct .="AND name LIKE '%{$search_each}%'";
    
}
  
$constructs = "SELECT * FROM data WHERE {$construct} and status = 'publish'";
$run = mysqli_query($con,$constructs);
    
$foundnum = mysqli_num_rows($run);
    
if ($foundnum==0)
$result =  "<div class = 'search-result'><h4>Sorry, there are no matching result for <b>$search</b>.</h4></div>";
else
{ 

$per_page = 6;
$start = isset($_GET['start']) ? $_GET['start']: '';
$max_pages = ceil($foundnum / $per_page);
if(!$start)
$start=0; 
$getquery = mysqli_query($con,"SELECT * FROM data WHERE $construct LIMIT $start, $per_page");
  
while($row = mysqli_fetch_assoc($getquery))
{

$string = substr($row['name'],0,20);
$result.= "
<div class='search-result'><a href = '/post?req={$row['name']}'><h7 style='font-size:18px;'>{$row['name']}</h7><br><hr id = 'hr'></a><h7 style='color:green;font-size:12px;'>http://semcrack.com/search?req={$string}...</h7><br><h7 style='font-size:17px;'>{$row['description']}</h7><br><h7 style='font-size:15px;'>{$row['branch']}</h7><br><h7 style='font-size:13px;'>Share by : {$row['user']}</h7></div>";
    
}
  
//Pagination Starts
  
$prev = $start - $per_page;
$next = $start + $per_page;
                       
$adjacents = 3;
$last = $max_pages - 1;
  
if($max_pages > 1)
{   
//previous button
if (!($start<=0)) 
$pagination.= " <a href='search.php?req=$search&start=$prev'><</a> ";    
          
//pages 
if ($max_pages < 7 + ($adjacents * 2))   //not enough pages to bother breaking it up
{
$i = 0;   
for ($counter = 1; $counter <= $max_pages; $counter++)
{
if ($i == $start){
$pagination.= " <a class='active' href='search.php?req=$search&start=$i'><b>$counter</b></a> ";
}
else {
$pagination.= " <a href='search.php?req=$search&start=$i'>$counter</a> ";
}  
$i = $i + $per_page;                 
}
}
elseif($max_pages > 5 + ($adjacents * 2))    //enough pages to hide some
{
//close to beginning; only hide later pages
if(($start/$per_page) < 1 + ($adjacents * 2))        
{
$i = 0;
for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
{
if ($i == $start){
$pagination.= " <a class='active' href='search.php?req=$search&start=$i'><b>$counter</b></a> ";
}
else {
$pagination.= " <a href='search.php?req=$search&start=$i'>$counter</a> ";
} 
$i = $i + $per_page;                                       
}
                          
}
//in middle; hide some front and some back
elseif($max_pages - ($adjacents * 2) > ($start / $per_page) && ($start / $per_page) > ($adjacents * 2))
{
$pagination.= " <a href='search.php?req=$search&start=0'>1</a> ";
$pagination.= " <a href='search.php?req=$search&start=$per_page'>2</a> .... ";
 
$i = $start;                 
for ($counter = ($start/$per_page)+1; $counter < ($start / $per_page) + $adjacents + 2; $counter++)
{
if ($i == $start){
$pagination.= " <a class='active' href='search.php?req=$search&start=$i'><b>$counter</b></a> ";
}
else {
$pagination.= " <a href='search.php?req=$search&start=$i'>$counter</a> ";
}   
$i = $i + $per_page;                
}
                                  
}
//close to end; only hide early pages
else
{
$pagination.= " <a href='search.php?req=$search&start=0'>1</a> ";
$pagination.= " <a href='search.php?req=$search&start=$per_page'>2</a> .... ";
 
$i = $start;                
for ($counter = ($start / $per_page) + 1; $counter <= $max_pages; $counter++)
{
if ($i == $start){
$pagination.= " <a class='active' href='search.php?req=$search&start=$i'><b>$counter</b></a> ";
}
else {
$pagination.= " <a href='search.php?req=$search&start=$i'>$counter</a> ";   
} 
$i = $i + $per_page;              
}
}
}
          
//next button
if (!($start >=$foundnum-$per_page))
$pagination.= " <a href='search.php?req=$search&start=$next'>></a> ";    
}   
} 
?>
<html>
<head>
  <title>SemCrack</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel = "stylesheet" href = "/css/milligram.css"></link>
  <link rel = "stylesheet" href = "/css/bootstrap.css"></link>
  <script type="text/javascript" src = "/js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src = "/js/umd/popper.min.js"></script>
  <script type="text/javascript" src = "/js/bootstrap.js"></script>
  <script type="text/javascript" src = "data.js"></script>
  <link rel = "stylesheet" href = "/css/style.css"></link>
  <body class="mobilesearch">
  <?php include_once "navbar-search.php"; ?>
    <section>
    <!--<div class="search-result">
    <form id ="form" style="margin: 0px;">
      <input style="display: none;" type="text" name = "req" value="<?php echo $req;?>"/>
      <select id="branch" name = "branch" onchange ="submit()">
        <option>Branch</option>
        <option>Computer Science</option>
        <option>Information Technology</option>
        <option>Mechanical</option>
        <option>Electrical</option>
        <option>Electronics</option>
        <option>Civil</option>
        <option>Automobile</option>
        <option>Chemical</option>
        <option>Biotechnology</option>
        
      </select>
      <select id="year" name = "year" onchange="submit()">
        <option>Year</option>
        <option>2017</option>
        <option>2016</option>
        <option>2015</option>
      </select>
      </form>
    </div>-->
    <div class = "result">
      <?php echo $result;?><br>
      <center><div class = 'pagination1'><?php echo $pagination;?></div></center>
    </div><br>
    </section>
  </body>
</head>
</html>
<script>
function submit(){
  document.getElementById("form").submit();
}
$(function(){
  if(localStorage.getItem('branch')){
    $('#branch').val(localStorage.getItem('branch'));
  }
  $('#branch').change(function(){
    localStorage.setItem('branch',$('#branch').val());
  });
  if(localStorage.getItem('year')){
    $('#year').val(localStorage.getItem('year'));
  }
  $('#year').change(function(){
    localStorage.setItem('year',$('#year').val());
  });
});
$(document).ready(function(){
    $('[data-toggle="popover"]').popover(); 
});
</script>
<style>
@media screen and (min-width: 640px){
  #hr{
    display: none;
  }
}
.pagination1 a {
    color: black;
    display: inline-block;
    padding: 8px 16px;
    text-decoration: none;
    transition: background-color .3s;
}

/* Style the active/current link */
.pagination1 a.active {
    background-color: #67b6ff;
    color: white;
}

/* Add a grey background color on mouse-over */
.pagination1 a:hover:not(.active) {background-color: #ddd;}

    .popover{
      padding-top: 20px;
      height: 200px;
        font-size: 15px;
        box-shadow: 0 3px 15px 0 rgba(0,0,0,0.2), 0 0 0 1px rgba(0,0,0,0.08);
    }
    .button-small {
  font-size: 1rem;
  height: 2.8rem;
  line-height: 2.8rem;
  padding: 0 1.5rem;
}
 </style>

<script>
function onlyAlphabets(e, t) {
            try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode = e.which;
                }
                else { return true; }
                if ((charCode > 64 && charCode < 91) || (charCode ==32 ) || (charCode == 13) || (charCode > 96 && charCode < 123))
                    return true;
                else
                    return false;
            }
            catch (err) {
                alert(err.Description);
            }
        }


  $(document).ready(function(){
    $('#searchbar').keyup(function(e){
      $('#result').html('');
      var searchField = $('#searchbar').val();
      var expression = new RegExp(searchField, "i");
      if (searchField != ""){
        $.each(data,function(key, value){
          if(value.name.search(expression) != -1){
            $('#result').append("<a href='/search?req="+value.name+"'><li style='text-align:left; border:none; border-radius:0px;' class = 'list-group-item livesearch-result'><h7 style='font-size:15px; color:black;'>"+value.name+"</h7></li></a>");
          }
        });
    }
    else{
      $('#result').html("");
    }
    });
  });
</script>