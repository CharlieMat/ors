<!DOCTYPE html>
<head>
    <title>Home</title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Trotting Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
    Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href='http://ajax.useso.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
    <script src="js/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/magnific-popup.css">
    <script type="text/javascript" src="js/move-top.js"></script>
           <script type="text/javascript" src="js/easing.js"></script>
            <script type="text/javascript">
                jQuery(document).ready(function($) {
                    $(".scroll").click(function(event){     
                        event.preventDefault();
                        $('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
                    });
                });
            </script>
            <script type="text/javascript">
            $(document).ready(function() {
                    /*
                    var defaults = {
                    containerID: 'toTop', // fading element id
                    containerHoverID: 'toTopHover', // fading element hover id
                    scrollSpeed: 1200,
                    easingType: 'linear' 
                    };
                    */
            $().UItoTop({ easingType: 'easeOutQuart' });
    });
    </script>
</head>

<body>

<!-- header -->
    <div class="banner">
        <div class="container">
            <?php include 'components/guide.php';?>
            <div class="top-slide">
                <section class="slider">
                        <div class="flexslider">
                            <ul class="slides">
                                <li>
                                    <div class="tittle">
                                        <h1>版本1.0</h1>
                                        <h2>数据统计、门诊排队分析、医生能力分析、病症门诊表现</h2>
                                    </div>
                                </li>
                                <li>
                                    <div class="tittle">
                                        <h1><a href="https://github.com/CharlieFaceButt/ors">Github</a></h1>
                                        <h2>项目工程源码入口</h2>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </section>
                </div>
                        <!-- FlexSlider -->
                              <script defer src="js/jquery.flexslider.js"></script>
                              <script type="text/javascript">
                                $(function(){
                                  SyntaxHighlighter.all();
                                });
                                $(window).load(function(){
                                  $('.flexslider').flexslider({
                                    animation: "slide",
                                    start: function(slider){
                                      $('body').removeClass('loading');
                                    }
                                  });
                                });
                              </script>
                        <!-- FlexSlider -->
        </div> 
    </div>
<!-- header -->
<!-- prasent -->
    <div class="prasent">
        <div class="container">
            <p><font color="white">进入大数据时代，大数据分析也逐步应用于各行各业，为行业人士发掘感兴趣的知识模式以带来商业利润和策略支持。作为近年惠民政策的重点之一，医疗领域的大数据分析应用也开始走入人们的生活，提供了更加便捷，更加利民的服务。近年来医指通逐步发展为国内公认的医疗电子平台，全国各地医院陆续部署了此系统，实现全国数据联网，于是我们便有了数据分析的基础。但在了解过其现有系统的大致情况后，发现其数据分析处理这一方面仍存在较大空白，基于现有医指通系统只能看作是一个数据库管理系统，并不能满足一个智能辅助的数据仓库系统要求。</font></p>
            <p><font color="white">本文以数据分析和挖掘为出发点，以软件工程方法，针对部分门诊数据进行了需求分析，并自顶向下进行系统和功能模块设计，然后讲述如何实现可视化浏览界面，接着增加智能导诊辅助系统面向群众的借口，使用浏览器/服务器（B/S）体系结构搭建跨平台应用。论文中重点阐述将系统设计实现分为数据录入、数据统计和数据分析三大功能模块的软件工程过程，以及实现过程中的关键技术理论。该系统应用，通过一些可靠的数据挖掘技术来实现医疗数据的分析，进而生成医疗知识指导，用以辅助医院和看病群众进行门诊流程相关决策。</font></p>
            <p><font color="white">现有医疗系统以医指通作为数据库平台，实现了全国医疗数据的逐步统一，但仍然存在许多不足：</font></p>
            <p><font color="white">1.历史数据未能得以充分利用，缺乏数据分析</font></p>
            <p><font color="white">2.仍然有很多医院未使用相同的数据格式来存储数据</font></p>
            <p><font color="white">3.门诊数据虽涉及个人隐私以及版权问题无法对众公开，但数据的相关分析却应该公开</font></p>
            <p><font color="white">显而易见，一个数据仓库为基础的数据分析系统将有效解决这些问题，与此同时也能帮助相关各方发现一些有趣的知识。</font></p> 
        </div>
    </div>
<!-- prasent -->
<!-- gravida -->
    <div class="gravida">
        <div class="container">
            <div class="col-md-6 gravida-left">
                <img src="images/img1.jpg" class="img-responsive" alt=""/>
                    <div class="gravida-1">
                        <p>门诊数据的概念描述，以及数据描述的可视化表示，应用饼图、柱状图、折线图等常用的图表形式形象表示门诊数据的一些特征。涉及的属性描述包括：性别比例、年龄分布、病症分布、等待时间分布、年度看病人数变化、医生接诊数量分布、复诊率、非复诊确诊率</p>
                        <a href="single.html" class="btn  btn-1c btn1 btn-1d">单属性特征描述</a>
                    </div>
            </div>
            <div class="col-md-6 gravida-right">
                <div class="gravida-botom">
                    <div class="grabotom-left">
                        <img src="images/img2.jpg" class="img-responsive" alt=""/>
                    </div>
                    <div class="grabotom-right">
                        <h4>排队等待时间分析</h4>
                        <p>有关排队等待时间的一些特征分析和比较分析结果，包括等待人数分析、平均等待时间分析、属性关联分析</p>
                            <a href="single.html" class="link">去看看</a>
                    </div>
                        <div class="clearfix"> </div>
                </div>
                <div class="gravida-botom">
                    <div class="grabotom-left">
                        <img src="images/img3.jpg" class="img-responsive" alt=""/>
                    </div>
                    <div class="grabotom-right">
                        <h4>医生能力分析</h4>
                        <p>对医生的能力和特性的评价分析，包括：单个医生的特征描述，和不同医生的记录对照</p>
                            <a href="single.html" class="link">去看看</a>
                    </div>
                        <div class="clearfix"> </div>
                </div>
                <div class="gravida-botom">
                    <div class="grabotom-left">
                        <img src="images/img4.jpg" class="img-responsive" alt=""/>
                    </div>
                    <div class="grabotom-right">
                        <h4>病症表现分析</h4>
                        <p>病症在不同的条件下表现不同，分析内容涉及：高发病症列表、不同病症之间的记录对照</p>
                            <a href="single.html" class="link">去看看</a>
                    </div>
                        <div class="clearfix"> </div>
                </div>
            </div>
                <div class="clearfix"> </div>
        </div>
    </div>
<!-- gravida -->

<!-- donec -->
    <div class="donec">
        <div class="container">
            <div class="donec-top">
                <div class="col-md-6 donec-left">
                    <h3>年平均看病人数</h3>
                    <p></p>
                </div>
                <div class="col-md-6 donec-right">
                    <h3>医生总人数</h3>
                    <p>blublu</p>
                </div>
            </div>
            <div class="donec-top">
                <div class="col-md-6 donec-left">
                    <h3>常见病症</h3>
                    <p>blublu</p>
                </div>
                <div class="col-md-6 donec-right">
                    <h3>挂号高峰时间段</h3>
                    <p>blublu</p>
                </div>
            </div>
            <div class="donec-top">
                <div class="col-md-6 donec-left">
                    <h3>平均年龄和方差</h3>
                    <p>blublu</p>
                </div>
                <div class="col-md-6 donec-right">
                    <h3>等待时间和方差</h3>
                    <p>blublu</p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
<!-- donec -->

<!-- footer -->
    <div class="footer">
        <div class="container">
            <p>Copyright &copy; 2015.Company name All rights reserved.<a target="_blank" href="http://sc.chinaz.com/moban/">&#x7F51;&#x9875;&#x6A21;&#x677F;</a></p>
        </div>
    </div>
<!-- footer -->
</body>