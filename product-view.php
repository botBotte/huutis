<?php
require_once ('config.php');
require_once ('db.php');
include ('templates/header.php');
$db = connect(DB_HOST, DB_NAME, DB_USERNAME, DB_PASSWORD);
?>
<?php
if (isset($_GET['id']))
{
    $id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id = " . $id;
    $result = mysqli_query($db, $sql);

   while ($row = mysqli_fetch_array($result))
    {
        $title = $row['title'];
        $img = $row['imgurl'];
        $desc = $row['description'];
        $start = $row['startprice'];
        $end = $row['endprice'];
        $startD = $row['startdate'];
        $endD = $row['enddate'];
    }

} else
{
    $id = '';
}
?>


<div class="row">
    <div class="col s12 m4">
      <div class="card">
        <div class="card-image">
          <img src="<?php echo $img;?>">
          <span class="card-title"><?php echo $title; ?></span>
        </div>
        <div class="card-content">
          <p><?php echo $desc; ?></p>
          <p id="startPrice"></p>Start price: <?php echo $start / 100 . ' €'; ?></p>
          <p id="endProce"></p>End price: <?php echo $end / 100 . ' €'; ?></p>
          <p id="startDate">Start date: <?php echo $startD; ?></p>
          <p id="endDate"></p>End date: <?php echo $endD; ?></p>
          <!-- <p> <?php echo time(); ?></p> -->
          <p id="price"></p>
        </div>
        <div class="card-action">
          <a href="#">Hello everybody</a>
        </div>
      </div>
    </div>
  </div>

<script>
const priceWrap = document.querySelector('#price');

let tickerPrice = 0;

function updatePrice(newPrice) {
	if ( !newPrice ) {
		newPrice = tickerPrice - 1;
	} 
	tickerPrice = newPrice; 
	newPrice = parseFloat(newPrice / 100).toFixed(2);
	priceWrap.innerHTML = newPrice;
	console.clear();
	console.log(newPrice);
}

let startPrice = document.getElementById('#startPrice');
let endPrice = document.getElementById('#endPrice');
let startDate = document.querySelector('#startDate');
let endDate = document.getElementById('#endDate');

console.log(startDate);

startDate 	= new Date(startDate).getTime() / 1000;
endDate 	= new Date(endDate).getTime() / 1000;

let dateDiff 		= endDate - startDate;
let priceDiff 		= startPrice - endPrice;
let currentTime 	= Date.now() / 1000;
let secondsPerPrice = dateDiff / priceDiff;
let diffToNow 		= currentTime - startDate;
let priceChange 	= diffToNow / secondsPerPrice;
let priceNow 		= startPrice - priceChange;

updatePrice(priceNow);

setInterval(updatePrice, (secondsPerPrice * 1000));

let priceLeft = (startPrice - priceNow) - 10000;
let timeLeft = priceLeft * secondsPerPrice;

console.log("Price left: " + priceLeft);
console.log("Hours left: " + ((timeLeft / 60) / 60));
console.log("Seconds per price: " + secondsPerPrice);

</script>
<?php
include('templates/footer.php');
?>