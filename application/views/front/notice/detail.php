<?
$row = FALSE;
if ( $response['status'] == 200 ) {
    if ( 0 < $response['data']['count'] ) {
        $row = $response['data']['out'][0];
    };
};
?>
<div class="section row">
    <nav>
        <div class="nav-wrapper">
            <div class="col s12">
                <a href="/notice" class="breadcrumb">공지사항</a>
                <a href="/notice/detail/<? echo $row['post_id']; ?>" class="breadcrumb">
                    <? 
                    if ( isset($row['post_content_title']) ) { 
                        echo $row['post_content_title']; 
                    } else { 
                        echo '-'; 
                    }; 
                    ?>
                </a>
            </div>
        </div>
    </nav>		
</div>
<div class="section">
    <p>
        <? if ( isset($row['post_content_article']) ) { echo $row['post_content_article']; } else { echo '-'; }; ?>
    </p>    
</div>
<div class="section right-align">

    <?
    $referer = @$_SERVER['HTTP_REFERER'];
    if ( isset($_GET['referer']) ) {
        $referer = $_GET['referer'];
    };
    ?>
    <button type="button" class="waves-effect waves-light btn" onclick="location.replace('<? echo $referer; ?>');">확인</button>    

</div>