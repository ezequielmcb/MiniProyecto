<?php
session_start();
if (!isset($_SESSION["user_data"])) {
    echo "No estas loggeado";
    die();
}
// var_dump($_POST["user_data"]);
$data = $_SESSION["user_data"];

require_once("../acctions/connect.php");

$stmt = $mysqli->query("SELECT * FROM usuario;");

while ($row = $stmt->fetch_assoc()) {
    if (isset($row["photo"])) {
        $route = $row["photo"];
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>

    <!-- LINK AL CSS -->
    <link rel="stylesheet" href="../css/perfil.css">
    <!-- LINK AL JS -->
    <script src="../acctions/accition.js" defer></script>

</head>
<body>
    <div class="divAll">
        <section class="secInicial">
            <div class="icnoImg">
                <span class="img">

                    <svg xmlns="http://www.w3.org/2000/svg" width="131" height="19" viewBox="0 0 131 19" fill="none">
                        <path d="M42.3127 7.90339C41.9876 8.25266 41.8252 8.73171 41.8252 9.34054C41.8252 9.95024 41.9876 10.4275 42.3127 10.7725C42.6375 11.1182 43.0682 11.2907 43.6043 11.2907C44.1241 11.2907 44.5528 11.1139 44.8899 10.7603C45.227 10.4075 45.3957 9.93369 45.3957 9.34054C45.3957 8.73955 45.227 8.26225 44.8899 7.90863C44.5528 7.55587 44.1241 7.37905 43.6043 7.37905C43.0682 7.37905 42.6375 7.55413 42.3127 7.90339ZM44.5244 6.28247C44.9265 6.54987 45.2169 6.9122 45.3957 7.36686V3.69909H47.1017V12.7165H45.3957V11.3029C45.2169 11.7576 44.9265 12.1216 44.5244 12.3934C44.1222 12.666 43.6367 12.8019 43.0682 12.8019C42.4995 12.8019 41.9876 12.6634 41.5328 12.3873C41.0777 12.1112 40.7224 11.7114 40.4665 11.187C40.2105 10.6627 40.0826 10.0478 40.0826 9.34054C40.0826 8.63416 40.2105 8.01924 40.4665 7.4949C40.7224 6.97056 41.0777 6.57077 41.5328 6.29466C41.9876 6.01856 42.4995 5.88007 43.0682 5.88007C43.6367 5.88007 44.1222 6.01421 44.5244 6.28247Z" fill="#282051" />
                        <path d="M52.8473 7.65952C52.5345 7.3747 52.1505 7.23273 51.6958 7.23273C51.2327 7.23273 50.8427 7.3747 50.5259 7.65952C50.2092 7.94346 50.0343 8.36241 50.0019 8.91463H53.28C53.3044 8.36241 53.1599 7.94346 52.8473 7.65952ZM54.9493 9.66977H50.0019C50.0263 10.2716 50.1888 10.7141 50.4894 10.998C50.7898 11.2829 51.1636 11.4248 51.6104 11.4248C52.0083 11.4248 52.3395 11.3273 52.6035 11.1322C52.8675 10.9371 53.0361 10.6732 53.1094 10.3404H54.9252C54.8355 10.8116 54.6448 11.2341 54.3523 11.6077C54.0599 11.9814 53.6839 12.2741 53.2252 12.4848C52.766 12.6965 52.2562 12.8019 51.6958 12.8019C51.0377 12.8019 50.4529 12.6617 49.9411 12.3812C49.4293 12.1007 49.031 11.7009 48.7468 11.181C48.4623 10.661 48.3203 10.0478 48.3203 9.34054C48.3203 8.63416 48.4623 8.01924 48.7468 7.4949C49.031 6.97056 49.4293 6.57077 49.9411 6.29466C50.4529 6.01856 51.0377 5.88007 51.6958 5.88007C52.3619 5.88007 52.9448 6.01856 53.4443 6.29466C53.9442 6.57077 54.3299 6.95053 54.6019 7.43393C54.8743 7.91734 55.0104 8.4678 55.0104 9.08534C55.0104 9.25605 54.9901 9.45028 54.9493 9.66977Z" fill="#282051" />
                        <path d="M59.1657 10.9981L60.8717 5.96552H62.6996L60.2014 12.7166H58.1055L55.6073 5.96552H57.4474L59.1657 10.9981Z" fill="#282051" />
                        <path d="M68.8593 6.58645C69.4403 7.05766 69.8035 7.69958 69.9498 8.51222H68.1346C68.0615 8.15512 67.8951 7.87291 67.6347 7.66561C67.3743 7.45832 67.0459 7.35467 66.6479 7.35467C66.1923 7.35467 65.8126 7.52365 65.5082 7.86072C65.2036 8.1978 65.0514 8.69077 65.0514 9.34054C65.0514 9.99117 65.2036 10.4842 65.5082 10.8212C65.8126 11.1592 66.1923 11.3273 66.6479 11.3273C67.0459 11.3273 67.3743 11.2236 67.6347 11.0163C67.8951 10.809 68.0615 10.5268 68.1346 10.1697H69.9498C69.8035 10.9824 69.4403 11.6243 68.8593 12.0946C68.2784 12.5658 67.5537 12.8019 66.6844 12.8019C66.026 12.8019 65.4414 12.6617 64.9295 12.3812C64.4177 12.1007 64.0195 11.7009 63.7352 11.181C63.4508 10.661 63.3087 10.0478 63.3087 9.34054C63.3087 8.63416 63.4508 8.01924 63.7352 7.4949C64.0195 6.97056 64.4177 6.57077 64.9295 6.29466C65.4414 6.01856 66.026 5.88007 66.6844 5.88007C67.5537 5.88007 68.2784 6.11611 68.8593 6.58645Z" fill="#282051" />
                        <path d="M77.0545 6.63532C77.5179 7.14746 77.7487 7.86691 77.7487 8.79278V12.7166H76.0433V8.98787C76.0433 8.45134 75.9048 8.03501 75.6287 7.73887C75.3526 7.44186 74.9746 7.29379 74.4955 7.29379C74.0078 7.29379 73.6184 7.45231 73.3258 7.76936C73.0331 8.08553 72.8868 8.54105 72.8868 9.1342V12.7166H71.1683V3.69918H72.8868V7.31817C73.0654 6.86351 73.3598 6.50815 73.77 6.25208C74.1802 5.99601 74.6541 5.86796 75.1897 5.86796C75.9701 5.86796 76.5912 6.12404 77.0545 6.63532Z" fill="#282051" />
                        <path d="M81.1491 7.90339C80.8233 8.25266 80.6613 8.73171 80.6613 9.34054C80.6613 9.95024 80.8233 10.4275 81.1491 10.7725C81.474 11.1182 81.9042 11.2907 82.4408 11.2907C82.9607 11.2907 83.3893 11.1139 83.7264 10.7603C84.0634 10.4075 84.2315 9.93369 84.2315 9.34054C84.2315 8.73955 84.0634 8.26225 83.7264 7.90863C83.3893 7.55587 82.9607 7.37905 82.4408 7.37905C81.9042 7.37905 81.474 7.55413 81.1491 7.90339ZM83.3666 6.28247C83.7725 6.54987 84.0617 6.9122 84.2315 7.36686V5.96543H85.9378V12.7165H84.2315V11.3029C84.0617 11.7576 83.7725 12.1216 83.3666 12.3934C82.9608 12.666 82.473 12.8019 81.9042 12.8019C81.3355 12.8019 80.8233 12.6634 80.3687 12.3873C79.914 12.1112 79.5586 11.7114 79.3026 11.187C79.0465 10.6627 78.9185 10.0478 78.9185 9.34054C78.9185 8.63416 79.0465 8.01924 79.3026 7.4949C79.5586 6.97056 79.914 6.57077 80.3687 6.29466C80.8233 6.01856 81.3355 5.88007 81.9042 5.88007C82.473 5.88007 82.9608 6.01421 83.3666 6.28247Z" fill="#282051" />
                        <path d="M89.2162 3.69918V12.7166H87.4977V3.69918H89.2162Z" fill="#282051" />
                        <path d="M92.4937 3.69918V12.7166H90.7753V3.69918H92.4937Z" fill="#282051" />
                        <path d="M98.2397 7.65952C97.9262 7.3747 97.5429 7.23273 97.0883 7.23273C96.6249 7.23273 96.2347 7.3747 95.9176 7.65952C95.6015 7.94346 95.4264 8.36241 95.3942 8.91463H98.6717C98.6961 8.36241 98.5524 7.94346 98.2397 7.65952ZM100.341 9.66977H95.3942C95.4186 10.2716 95.5806 10.7141 95.8811 10.998C96.1816 11.2829 96.5552 11.4248 97.0029 11.4248C97.4001 11.4248 97.7319 11.3273 97.9958 11.1322C98.2597 10.9371 98.4279 10.6732 98.501 10.3404H100.317C100.227 10.8116 100.037 11.2341 99.7448 11.6077C99.4521 11.9814 99.0759 12.2741 98.6169 12.4848C98.1578 12.6965 97.6483 12.8019 97.0883 12.8019C96.4298 12.8019 95.8453 12.6617 95.3332 12.3812C94.8211 12.1007 94.423 11.7009 94.1391 11.181C93.8543 10.661 93.7123 10.0478 93.7123 9.34054C93.7123 8.63416 93.8543 8.01924 94.1391 7.4949C94.423 6.97056 94.8211 6.57077 95.3332 6.29466C95.8453 6.01856 96.4298 5.88007 97.0883 5.88007C97.7537 5.88007 98.3373 6.01856 98.8363 6.29466C99.3363 6.57077 99.7222 6.95053 99.9939 7.43393C100.267 7.91734 100.402 8.4678 100.402 9.08534C100.402 9.25605 100.382 9.45028 100.341 9.66977Z" fill="#282051" />
                        <path d="M107.507 6.63532C107.97 7.14746 108.201 7.86691 108.201 8.79278V12.7166H106.495V8.98787C106.495 8.45134 106.357 8.03501 106.081 7.73887C105.804 7.44186 105.427 7.29379 104.947 7.29379C104.46 7.29379 104.07 7.45231 103.778 7.76936C103.486 8.08553 103.339 8.54105 103.339 9.1342V12.7166H101.621V5.96552H103.339V7.31817C103.518 6.86351 103.812 6.50815 104.223 6.25208C104.633 5.99601 105.106 5.86796 105.642 5.86796C106.422 5.86796 107.044 6.12404 107.507 6.63532Z" fill="#282051" />
                        <path d="M111.601 7.90355C111.276 8.25282 111.114 8.73187 111.114 9.3407C111.114 9.95039 111.276 10.4277 111.601 10.7726C111.926 11.1184 112.357 11.2909 112.893 11.2909C113.413 11.2909 113.841 11.114 114.178 10.7604C114.515 10.4077 114.684 9.93385 114.684 9.3407C114.684 8.73971 114.515 8.26241 114.178 7.90878C113.841 7.55603 113.413 7.37921 112.893 7.37921C112.357 7.37921 111.926 7.55428 111.601 7.90355ZM113.819 6.28263C114.225 6.55003 114.513 6.91236 114.684 7.36702V5.96559H116.39V12.7411C116.39 13.3664 116.266 13.9291 116.019 14.4291C115.77 14.9281 115.401 15.3201 114.91 15.6049C114.418 15.8888 113.823 16.0308 113.124 16.0308C112.15 16.0308 111.361 15.8 110.76 15.3366C110.159 14.8733 109.794 14.2435 109.664 13.4474H111.357C111.455 13.7889 111.644 14.0545 111.924 14.2461C112.204 14.4369 112.563 14.5327 113.002 14.5327C113.506 14.5327 113.912 14.3838 114.221 14.0876C114.53 13.7906 114.684 13.3421 114.684 12.7411V11.303C114.513 11.7577 114.225 12.1218 113.819 12.3935C113.413 12.6662 112.925 12.802 112.357 12.802C111.788 12.802 111.276 12.6635 110.821 12.3874C110.366 12.1113 110.011 11.7115 109.755 11.1872C109.499 10.6629 109.371 10.0479 109.371 9.3407C109.371 8.63432 109.499 8.0194 109.755 7.49506C110.011 6.97072 110.366 6.57093 110.821 6.29482C111.276 6.01872 111.788 5.88023 112.357 5.88023C112.925 5.88023 113.413 6.01437 113.819 6.28263Z" fill="#282051" />
                        <path d="M122.135 7.66031C121.822 7.3765 121.438 7.23353 120.983 7.23353C120.521 7.23353 120.131 7.3765 119.813 7.66031C119.496 7.94483 119.322 8.36312 119.29 8.91554H122.567C122.592 8.36312 122.448 7.94483 122.135 7.66031ZM124.238 9.67107H119.29C119.314 10.2727 119.477 10.7151 119.777 10.9991C120.078 11.2839 120.451 11.4259 120.898 11.4259C121.296 11.4259 121.627 11.3283 121.891 11.1332C122.155 10.9381 122.324 10.6742 122.397 10.3415H124.213C124.123 10.8127 123.933 11.2351 123.64 11.6088C123.348 11.9824 122.972 12.2751 122.513 12.4859C122.054 12.6975 121.544 12.8029 120.983 12.8029C120.325 12.8029 119.74 12.6627 119.228 12.3822C118.717 12.1018 118.319 11.702 118.034 11.182C117.75 10.6621 117.608 10.0489 117.608 9.34205C117.608 8.63522 117.75 8.01989 118.034 7.49535C118.319 6.97171 118.717 6.57228 119.228 6.29526C119.74 6.01914 120.325 5.88153 120.983 5.88153C121.65 5.88153 122.232 6.01914 122.732 6.29526C123.231 6.57228 123.617 6.95205 123.89 7.43459C124.162 7.91829 124.298 8.46875 124.298 9.08604C124.298 9.25671 124.278 9.45169 124.238 9.67107Z" fill="#282051" />
                        <path d="M129.818 6.5027C130.314 6.91697 130.623 7.4696 130.744 8.15994H129.135C129.071 7.83512 128.924 7.57491 128.697 7.38006C128.47 7.18502 128.173 7.08763 127.808 7.08763C127.515 7.08763 127.288 7.15672 127.124 7.29471C126.963 7.43299 126.881 7.61981 126.881 7.85528C126.881 8.04229 126.946 8.19252 127.076 8.30614C127.206 8.41996 127.369 8.50921 127.564 8.5742C127.759 8.63927 128.039 8.71649 128.404 8.80575C128.916 8.91966 129.332 9.03944 129.654 9.1653C129.975 9.29134 130.251 9.4903 130.483 9.76246C130.714 10.0349 130.829 10.4024 130.829 10.8649C130.829 11.4424 130.604 11.9093 130.153 12.2663C129.702 12.6243 129.095 12.8029 128.332 12.8029C127.454 12.8029 126.751 12.606 126.223 12.2115C125.695 11.8178 125.374 11.2552 125.261 10.5243H126.905C126.946 10.8571 127.093 11.1193 127.345 11.31C127.596 11.5007 127.925 11.5965 128.332 11.5965C128.624 11.5965 128.848 11.5252 129.002 11.3832C129.156 11.2412 129.233 11.0566 129.233 10.8283C129.233 10.6333 129.166 10.4756 129.032 10.3537C128.898 10.2317 128.732 10.1385 128.532 10.0732C128.333 10.0079 128.051 9.93126 127.685 9.84163C127.181 9.72791 126.774 9.61214 126.461 9.49422C126.149 9.37658 125.88 9.1877 125.657 8.92768C125.433 8.66766 125.321 8.31035 125.321 7.85528C125.321 7.27035 125.545 6.79512 125.992 6.4295C126.438 6.06406 127.056 5.88117 127.844 5.88117C128.665 5.88117 129.322 6.08835 129.818 6.5027Z" fill="#282051" />
                        <path d="M35.3654 12.0035L24.6234 17.7103C24.2741 17.8958 23.8804 17.9942 23.4867 17.9942C22.5861 17.9942 21.7648 17.5004 21.3432 16.706C21.0392 16.1329 20.9756 15.4779 21.1655 14.8578C21.3554 14.2376 21.7752 13.7298 22.3475 13.4259L33.0895 7.7191C33.4387 7.5327 33.8315 7.43602 34.2261 7.43602C34.5649 7.43602 34.8933 7.5057 35.1929 7.63635L35.3645 7.72781C35.793 7.95427 36.1397 8.30092 36.367 8.72945C36.3749 8.74252 36.3836 8.75558 36.3923 8.76865C36.9846 9.94275 36.5308 11.3843 35.3654 12.0035ZM1.81287 11.0045C1.80764 10.994 1.7998 10.9853 1.79283 10.9749C1.19098 9.79817 1.64302 8.34883 2.81364 7.72781L13.5556 2.02017C13.9049 1.83552 14.2977 1.73623 14.6923 1.73623C15.592 1.73623 16.4134 2.23008 16.8358 3.02443C17.1389 3.5958 17.2016 4.25254 17.0117 4.87182C16.8219 5.49197 16.4029 6.0015 15.8315 6.3046L5.08955 12.0122C4.74028 12.1978 4.34659 12.2953 3.9529 12.2953C3.61409 12.2953 3.28572 12.2248 2.9861 12.0959L2.81364 12.0035C2.38598 11.7771 2.0402 11.4313 1.81287 11.0045ZM37.1387 8.31399C36.7895 7.65813 36.239 7.15296 35.5866 6.85769L27.5142 2.56978L25.3855 1.43922L25.3777 1.43486L25.0319 1.25195C24.5807 1.01243 24.0755 0.881779 23.5669 0.868713C23.5573 0.868713 23.5477 0.86698 23.5381 0.86698C23.5207 0.86698 23.5033 0.865234 23.4867 0.865234L23.4772 0.866102C22.445 0.85565 21.4242 1.32599 20.7753 2.21876L13.8279 11.4653C13.6841 11.6569 13.7224 11.9304 13.915 12.075C14.1074 12.2195 14.38 12.1803 14.5246 11.9879L21.4756 2.73527C22.2612 1.65349 23.7811 1.41309 24.8638 2.19873C25.5911 2.72829 25.9656 3.60974 25.8402 4.50077C25.7853 4.89097 25.6329 5.26724 25.4047 5.5808L17.989 15.4579C17.9786 15.1713 17.9315 14.8839 17.8453 14.6035C17.5875 13.7612 17.0178 13.0696 16.24 12.6559L10.3333 9.50638C10.1207 9.39315 9.85686 9.47416 9.7445 9.68668C9.63119 9.89833 9.71219 10.1622 9.9248 10.2755L15.8315 13.4259C16.4038 13.7298 16.8227 14.2376 17.0126 14.8578C17.2025 15.4779 17.1398 16.1329 16.8358 16.706C16.5771 17.1929 16.1678 17.5657 15.6835 17.7826C15.6182 17.8026 15.552 17.8209 15.4849 17.8375C15.4248 17.8497 15.3708 17.8749 15.3246 17.9098C15.1217 17.9646 14.9092 17.9942 14.6923 17.9942C14.2977 17.9942 13.9049 17.8958 13.5556 17.7103L6.28195 13.8457L4.79342 13.0557C5.03729 12.9904 5.2742 12.8989 5.49805 12.7813L16.24 7.07456C17.017 6.66084 17.5866 5.97014 17.8444 5.12788C18.1022 4.28389 18.0169 3.39199 17.6049 2.61594C17.0309 1.5359 15.9152 0.865234 14.6923 0.865234C14.1558 0.865234 13.6218 0.999363 13.1471 1.25195L2.40514 6.95785C0.799897 7.81056 0.187588 9.81036 1.04029 11.4156C1.38956 12.0723 1.94003 12.5766 2.59241 12.8728L2.74309 12.9529H2.74483L5.15139 14.2315L13.1471 18.4794C13.6218 18.732 14.1558 18.8652 14.6923 18.8652C15.153 18.8652 15.599 18.7694 16.0057 18.5935C16.6485 18.3749 17.2103 17.9646 17.6084 17.4168L26.1058 6.09904C26.4211 5.66355 26.6275 5.15401 26.7024 4.62271C26.7791 4.07659 26.7173 3.53657 26.5378 3.03749L27.8365 3.72646L33.3847 6.67478C33.1409 6.73923 32.9039 6.83069 32.681 6.94914L27.8374 9.52206L24.4231 7.71997C24.2097 7.60849 23.9476 7.69123 23.8361 7.90463C23.7246 8.11802 23.8065 8.38106 24.0199 8.49255L26.9054 10.0185L21.9381 12.6559C21.1612 13.0696 20.5907 13.7612 20.3329 14.6035C20.075 15.444 20.1604 16.3367 20.5741 17.1145C21.1472 18.1937 22.263 18.8652 23.4867 18.8652C24.0224 18.8652 24.5572 18.732 25.0319 18.4794L35.7739 12.7726C37.3791 11.919 37.9914 9.92098 37.1387 8.31399Z" fill="#F0402C" />
                        <path d="M27.8365 3.72638L26.5378 3.03742L26.537 3.03568C26.2835 2.3685 25.8828 1.73963 25.3855 1.43914L27.5142 2.5697C27.6762 2.93726 27.786 3.32485 27.8365 3.72638Z" fill="#C73622" />
                        <path d="M5.15144 14.2319L2.74487 12.9533C2.78311 12.9664 3.40727 13.1728 4.05703 13.1728C4.30962 13.1728 4.56604 13.1414 4.79346 13.0561L6.28199 13.8461C5.92575 14.0307 5.54425 14.1588 5.15144 14.2319Z" fill="#C73622" />
                    </svg>

                </span>
                <div>
                    <div id="toggleButton" class="imgName">
                        <img class="img" src="<?= isset($route) ? $route : '../imgs/ingresa.jpg'; ?>" alt="perfil">
                        <p id="name"><?= ($data['name'])?></p>
                    </div>
                    <div class="hidden">
                        <a href="../views/perfil.php" class="cajita person">
                            <img src="../imgs/persona.svg" alt="person">
                            <p>My Profile</p>
                        </a>
                        <div class="cajita">
                            <img src="../imgs/grupo.svg" alt="person">
                            <p>Group Chat</p>
                        </div>
                        <a href="../acctions/logout.php" class="cajita logout">
                            <img src="../imgs/logout.svg" alt="person">
                            <p>Logout</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="infoPersonal">
                <h1>Personal info</h1>
                <p>Basic info, like your name and photo</p>
            </div>
            <div class="informacionUser">
                <div class="profile">
                    <div class="divPorfile">
                        <h1>Profile</h1>
                        <p>some info may be visible to<br>other people</p>
                    </div>
                    <a class="edit" href="../views/editar.php">Edit</a>
                </div>
                <div class="infoUser">
                    <div class="info foto">
                        <h1 class="user">PHOTO</h1>
                        <img class="dataUser" src="<?= isset($route) ? $route : '../imgs/ingresa.jpg'; ?>" alt="perfil">
                    </div>
                    <div class="info name">
                        <h1 class="user">NAME</h1>
                        <p class="dataUser"><?= ($data['name'])?> </p>
                    </div>
                    <div class="info bio">
                        <h1 class="user">BIO</h1>
                        <p class="dataUser"><?= ($data['bio'])?></p>
                    </div>
                    <div class="info phone">
                        <h1 class="user">PHONE</h1>
                        <p class="dataUser"><?= ($data['phone'])?></p>
                    </div>
                    <div class="info email">
                        <h1 class="user">EMAIL</h1>
                        <p class="dataUser"><?= ($data['email'])?></p>
                    </div>
                    <div class="info pass">
                        <h1 class="user">PASSWORD</h1>
                        <p class="dataUser">*********</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>