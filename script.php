<script>

// Constants routes for the pages of the website
// Use these with gotoPage() function, e.g., gotoPage(COMMUNITY)

// Get base URL dynamically
const BASE_URL = window.location.origin + window.location.pathname.substring(0, window.location.pathname.lastIndexOf('/forestsoul_php/') + '/forestsoul_php/'.length);

// Main Pages
const HOME = BASE_URL + "index.php";
const COMMUNITY = BASE_URL + "community/index.php";
const DONATION = BASE_URL + "donation/index.php";
const ADMIN_DONATION = BASE_URL + "admin donation/index.php";
const GAMES = BASE_URL + "games/index.php";
const MEDITATION = BASE_URL + "meditation/index.php";
const YOGA = BASE_URL + "yoga/index.php";
const QUESTIONNAIRE = BASE_URL + "questionnaire/index.php";
const PROFILE = BASE_URL + "profile/index.php";
const USER_PROGRESS = BASE_URL + "user progress/index.php";
const STAFF = BASE_URL + "staff/index.php";

// Auth Pages
const AUTH = BASE_URL + "auth/index.php";
const LOGIN = BASE_URL + "login/index.php";
const SIGNUP = BASE_URL + "signup/index.php";

// Components
const NAVBAR = BASE_URL + "navbar/index.php";
const FOOTER = BASE_URL + "components/footer.php";




function gotoPage(page){
    window.location.href = page;
}


function openInNewTab(url) {
  var win = window.open(url, '_blank');
  win.focus();
}

function goBack() {
  window.history.back();
}

function goForward() {
  window.history.forward();
}

function reloadPage() {
  location.reload();
}

function scrollToTop() {
  window.scrollTo({top: 0, behavior: 'smooth'});
}

function scrollToBottom() {
  window.scrollTo({top: document.body.scrollHeight, behavior: 'smooth'});
}

function gotoFooter(){
    window.location.href = "#footer";
}




</script>