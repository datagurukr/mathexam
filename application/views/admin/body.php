<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>Starter Template - Materialize</title>

        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="/assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="/assets/css/customizing.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="/assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

        <!--  Scripts-->
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="js/materialize.js"></script>
        <script src="js/init.js"></script>    
    </head>
    <body>
        <nav class="light-blue lighten-1" role="navigation">
            <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Logo</a>
                <ul class="right hide-on-med-and-down">
                    <li>
                        <a href="/admin/user">회원정보</a>
                    </li>
                    <li>
                        <a href="/admin/terms">이용약관</a>
                    </li>
                    <li>
                        <a href="/admin/privacy">개인정보처리방침</a>
                    </li>
                    <li>
                        <a href="/admin/category">코스</a>
                    </li>
                    <li>
                        <a href="/admin/subject">서브 코스</a>
                    </li>
                    <li>
                        <a href="/admin/unit">챕터</a>
                    </li>
                    <li>
                        <a href="/admin/exam">유닛</a>
                    </li>
                    <li>
                        <a href="/admin/purchase">구매내역</a>
                    </li>
                    <li>
                        <a href="/admin/statistics">통계</a>
                    </li>
                    <li>
                        <a href="/admin/qna">Q&A</a>
                    </li>
                    <li>
                        <a href="/logout">로그아웃</a>
                    </li>
                </ul>
                <ul id="nav-mobile" class="side-nav">
                    <li>
                        <a href="/admin/user">회원정보</a>
                    </li>
                    <li>
                        <a href="/admin/terms">이용약관</a>
                    </li>
                    <li>
                        <a href="/admin/privacy">개인정보처리방침</a>
                    </li>
                    <li>
                        <a href="/admin/category">코스</a>
                    </li>
                    <li>
                        <a href="/admin/subject">서브 코스</a>
                    </li>
                    <li>
                        <a href="/admin/unit">챕터</a>
                    </li>
                    <li>
                        <a href="/admin/exam">유닛</a>
                    </li>
                    <li>
                        <a href="/admin/purchase">구매내역</a>
                    </li>
                    <li>
                        <a href="/admin/statistics">통계</a>
                    </li>
                    <li>
                        <a href="/admin/qna">Q&A</a>
                    </li>
                    <li>
                        <a href="/logout">로그아웃</a>
                    </li>
                </ul>
                <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
            </div>
        </nav>
        <div class="container">
            <!-- container -->
            <? echo $container; ?>            
        </div>
        <footer class="page-footer orange">
            <div class="container">
                <div>
                    <a class="orange-text text-lighten-3" href="/terms">이용약관</a> | 
                    <a class="orange-text text-lighten-3" href="/privacy">개인정보 처리방침</a>
                </div>
                서울시 서초구 서초대로 301 동성빌딩
                대표: 대표명 | 사업자등록번호: 111-23-45678
                사업신고번호: 서울 22
                고객센터: 1500-1500 Copyright Company. Allright
            </div>
            <div class="footer-copyright">
                <div class="container">
                    Made by <a class="orange-text text-lighten-3" href="http://materializecss.com">Materialize</a>
                </div>
            </div>
        </footer>
    </body>
</html>