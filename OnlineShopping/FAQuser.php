<?php


include 'userHeader.php';

?>

<div id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
         Q1 - While will my order ship?
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
       After your payment is verified, it takes up to 24 hours to process and ship your order. This does not include weekends or holidays. Purchases made after 11 am PST will not be shipped out until the next business day. If you order after 11 am PST on a Friday, your order will likely be shipped out on the following Monday.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Q2 - Will I have to pay niternational taxes & duties?
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
        Your order may be subject to import duties and taxes, which are levied once a shipment reaches your country. The general amount for the duties and taxes fee is about 20% of the dollar amount of the merchandise. However, this is just a general guideline and may vary depending on the country to which the order was shipped. You should contact your customs office for specific amounts and percentages.
      <br><br>MEGA cannot control and is not responsible for any duties/taxes applied to your package. You will be responsible for paying additional charges for customs clearance. Customs policies vary widely from country to country; please contact your local customs office for further information. Note, in rare occasions custom agents may delay delivery of some packages.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
         Q3 - What is your exchange policy?
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta porro, vel ut consequatur voluptas enim tempore aliquam fuga deleniti delectus
         </div>
    </div>
  </div>
</div>
<?php
include 'userfooter.php';
?>