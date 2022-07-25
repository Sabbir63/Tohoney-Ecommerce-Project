<style>
@import url('https://fonts.googleapis.com/css?family=Sulphur+Point&display=swap');

body {
  background-color: #f5f5f5;
  margin: 0;
  padding: 0;
  font-family: 'Sulphur Point', sans-serif;
}
.fa-star{
  color:burlywood;
  font-size: 2.2rem;
  opacity: 1;

}

.container {
  position: absolute;
  transform: translate(-50%, -50%);
  top: 50%;
  left: 50%;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

.reviews {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  margin-bottom: 20%;
}

.review {
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
  width: 80%;
  padding: 0 50px;
  font-size: 1.1rem;
  overflow: hidden;
}

.reviewstuff{
  width: 80%;
}

.input {
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 100%;
}

.reviewinp {
  width: 300px;
  height: 70px;
  outline: none;
  border-radius: 5px;
  border: none;
  background-color: #f5f5f5;
  resize: none;
  padding: 10px 5px 10px 10px;
  font-family: 'Sulphur Point', sans-serif;
  font-size: 1rem;
}

.stars {
  display: flex;
  padding: 0 20px;
}

.star1, .star2, .star3, .star4, .star5 {
  margin-right: 5px;
  font-size: 1.3rem;
  cursor: pointer;
}

.submit {
  color: white;
  background-color: #036bfc;
  border: none;
  padding: 10px 20px;
  border-radius: 5px;
  outline: none;
  cursor: pointer;
  font-family: 'Sulphur Point', sans-serif;
  font-size: 1rem;
  transition: all .2s ease-in-out;
}

.submit:hover {
  background-color: #4592ff;
}

.arrows {
  font-size: 1.8rem;
  cursor: pointer;
}

.input-container {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  background-color: white;
  padding: 30px;
  border-radius: 10px;
  border: 1.5px solid #d1d1d1;
  width: 100%;
}

.names {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  margin-bottom: 20px;
}

.firstname, .lastname {
  width: 100%;
  padding: 10px 0 10px 10px;
  outline: none;
  border-radius: 5px;
  border: none;
  background-color: #f5f5f5;
  font-family: 'Sulphur Point', sans-serif;
  font-size: 1rem;
}

.firstname {
  margin-right: 10px;
}

.lastname {
  margin-left: 10px;
}

.reviewstuff {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

.rname {
  display: flex;
  justify-content: center;
  margin-right: 30px;
}

.rfname {
  margin-right: 2.5px;
  white-space: nowrap;
}

.rlname {
  margin-left: 2.5px;
  white-space: nowrap;
}

.bottomreview {
  display: flex;
  width: 40%;
  justify-content: center;
  align-items: center;
  margin-top: 20px;
}

.stars2 {
  display: flex;
}

.errorcontainer {
  width: 85%;
  justify-content: center;
  align-items: center;
  margin-bottom: 50px;
  position: absolute;
  background-color: #ff4242;
  color: white;
  padding: 10px 75px;
  text-align: center;
  display: flex;
  opacity: 0;
  transition: opacity, .5s;
}

.display {
  opacity: 1;
}

.exc {
  margin-right: 20px;
  font-size: 1.3rem;
}

.thank-you-container {
  font-size: 2rem;
  color: #919191;
  display: none;
  visibility: hidden;
  justify-content: center;
  align-items: center;
  transition: all .7s;
  opacity: 0;
}

.thank-you {
  white-space: nowrap;
}

.fa-kiss-wink-heart{
  color: #ff429a;
  margin-left: 10px;
}
/* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++= */
.rating {
  --dir: right;
  --fill: gold;
  --fillbg: rgba(100, 100, 100, 0.15);
  --heart: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 21.328l-1.453-1.313q-2.484-2.25-3.609-3.328t-2.508-2.672-1.898-2.883-0.516-2.648q0-2.297 1.57-3.891t3.914-1.594q2.719 0 4.5 2.109 1.781-2.109 4.5-2.109 2.344 0 3.914 1.594t1.57 3.891q0 1.828-1.219 3.797t-2.648 3.422-4.664 4.359z"/></svg>');
  --star: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 17.25l-6.188 3.75 1.641-7.031-5.438-4.734 7.172-0.609 2.813-6.609 2.813 6.609 7.172 0.609-5.438 4.734 1.641 7.031z"/></svg>');
  --stars: 5;
  --starsize: 3rem;
  --symbol: var(--star);
  --value: 1;
  --w: calc(var(--stars) * var(--starsize));
  --x: calc(100% * (var(--value) / var(--stars)));
  block-size: var(--starsize);
  inline-size: var(--w);
  position: relative;
  touch-action: manipulation;
  -webkit-appearance: none;
}
[dir="rtl"] .rating {
  --dir: left;
}
.rating::-moz-range-track {
  background: linear-gradient(to var(--dir), var(--fill) 0 var(--x), var(--fillbg) 0 var(--x));
  block-size: 100%;
  mask: repeat left center/var(--starsize) var(--symbol);
}
.rating::-webkit-slider-runnable-track {
  background: linear-gradient(to var(--dir), var(--fill) 0 var(--x), var(--fillbg) 0 var(--x));
  block-size: 100%;
  mask: repeat left center/var(--starsize) var(--symbol);
  -webkit-mask: repeat left center/var(--starsize) var(--symbol);
}
.rating::-moz-range-thumb {
  height: var(--starsize);
  opacity: 0;
  width: var(--starsize);
}
.rating::-webkit-slider-thumb {
  height: var(--starsize);
  opacity: 0;
  width: var(--starsize);
  -webkit-appearance: none;
}
.rating, .rating-label {
  display: block;
  font-family: ui-sans-serif, system-ui, sans-serif;
}
.rating-label {
  margin-block-end: 1rem;
}

/* NO JS */
.rating--nojs::-moz-range-track {
  background: var(--fillbg);
}
.rating--nojs::-moz-range-progress {
  background: var(--fill);
  block-size: 100%;
  mask: repeat left center/var(--starsize) var(--star);
}
.rating--nojs::-webkit-slider-runnable-track {
  background: var(--fillbg);
}
.rating--nojs::-webkit-slider-thumb {
  background-color: var(--fill);
  box-shadow: calc(0rem - var(--w)) 0 0 var(--w) var(--fill);
  opacity: 1;
  width: 1px;
}
[dir="rtl"] .rating--nojs::-webkit-slider-thumb {
  box-shadow: var(--w) 0 0 var(--w) var(--fill);
}

</style>
<div class="container">
  <!-- <div class="reviews">
    <div class="arrow1 arrows">
      <i class="fas fa-chevron-left"></i>
    </div>
    <div class="reviewstuff">
      <p class="review">Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse cumque totam quisquam iusto neque quibusdam sapiente fuga. Et fugit culpa, error delectus ullam nesciunt in quas, fuga corrupti facilis tempora.</p>
      <div class="bottomreview">
        <div class="rname">
          <div class="rfname">John</div>
          <div class="rlname">Smith</div>
        </div>
        <div class="stars2">
          <div><i class="far fa-star rstar1"></i></div>
          <div><i class="far fa-star rstar2"></i></div>
          <div><i class="far fa-star rstar3"></i></div>
          <div><i class="far fa-star rstar4"></i></div>
          <div><i class="far fa-star rstar5"></i></div>
        </div>
      </div>
    </div>
    <div class="arrow2 arrows">
      <i class="fas fa-chevron-right"></i>
    </div>
  </div> -->
  <div class="errorcontainer">
    <i class="fas fa-exclamation-circle exc"></i>
    <div class="error">Your review must be legible! Try again!</div>
  </div>
  <div class="input-container">
    <div class="thank-you-container">
      <div class="thank-you">Thank you for your review!</div>
      <i class="fas fa-kiss-wink-heart"></i>
    </div>
    <form class="" action="{{route('blogpost')}}" method="post">
      @csrf
    <div class="names">
      @php
      $product_id =  App\Models\Order_details::where('order_id',$online_order_id)->firstorFail()->product_id
      @endphp
      <input type="hiden" name="cl_id" class="firstname" value="{{$product_id}}">
      <input type="text" name="cl_f_name" class="firstname" placeholder="First name">
      <input type="text" name="cl_l_name" class="lastname" placeholder="Last name">
    </div>
    <div class="input">
      <div class="inputbox">
        <textarea type="text" name="cl_text" class="reviewinp" placeholder="Write a review"></textarea>
      </div>
      <label class="rating-label"><strong>“Half stars” using <code>step="0.5"</code></strong>
    <input name="cl_rating"
      class="rating"
      max="5"
      oninput="this.style.setProperty('--value', `${this.valueAsNumber}`)"
      step="0.5"
      style="--value:2.5"
      type="range"
      value="2.5">
  </label>
      <div class="submitbtn">
        <button class="submit">Submit Review</button>
      </div>
    </form>
    </div>
  </div>
</div>

<script src="https://kit.fontawesome.com/850830ed04.js" crossorigin="anonymous"></script>
<script>
  //making the submit button push the input from the user to the html content

  var submitBtn = document.querySelector('.submitbtn')
  var firstNameInp = document.querySelector('.firstname');
  var lastNameInp = document.querySelector('.lastname');
  var reviewInp = document.querySelector('.reviewinp');
  var review = document.querySelector('.review');
  var lastName = document.querySelector('.rlname');
  var firstName = document.querySelector('.rfname');
  var error = document.querySelector('.errorcontainer')

  //check for no spaces

  function hasNoSpaces(string){
    return string.indexOf(' ') === -1;
  }

  function displayNone(){
    error.style.opacity = 0;
  }

  function displayThanks(){
    thankYou.style.visibility = "visible";
    thankYou.style.opacity = 1;
  }


  //submit button event

  var thankYou = document.querySelector('.thank-you-container');

  var names = document.querySelector('.names');
  var input = document.querySelector('.input');


</script>
