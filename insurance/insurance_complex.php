<!DOCTYPE html>
<html class="no-js">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="icon" type="image/png" href="../images/favicon.png">
        <title>Подбор наиболее выгодного комплексного страхования для бизнеса</title>
        <meta name="description" content="Подбор выгодного комплексного страхования для вашего бизнеса среди всех предложений от российских компаний">
        <meta name="keywords" content="страхование, бизнес, недвижимость, автотранспорт, финансы, грузы, для бизнеса">
        <meta name="author" content="">

        <meta name="format-detection" content="telephone=no">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/ionicons.min.css">
        <link rel="stylesheet" href="../css/animate.css">
        <link rel="stylesheet" href="../css/slider.css">
        <link rel="stylesheet" href="../css/owl.carousel.css">
        <link rel="stylesheet" href="../css/owl.theme.css">
        <link rel="stylesheet" href="../css/jquery.fancybox.css">
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/responsive.css">

        <script src="../js/vendor/modernizr-2.6.2.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="../js/owl.carousel.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/wow.min.js"></script>
        <script src="../js/slider.js"></script>
        <script src="js/jquery.fancybox.js"></script>
        <script src="../js/main.js"></script>

        <script async type="text/javascript">

            $( document ).ready(function() {
                $('[data-toggle="tooltip"]').tooltip();
            });

            function changed_form() {

                var newUrl = '';

                switch ($('#type_insurance' ).val()){
                    case 'transport': newUrl = '/insurance_transport.php'; break;
                    case 'realty': newUrl = '/insurance_realty.php'; break;
                    case 'finance': newUrl = '/insurance_finance.php'; break;
                    case 'complex': newUrl = '/insurance_complex.php'; break;
                }

                window.location.href = document.URL.substr(0,document.URL.lastIndexOf('/')) + newUrl;

            }

            function get_insurance(){

                var myData={
                    type_insurance: $('#type_insurance' ).val()
                };

                jQuery.ajax({
                    type: "GET",
                    url: "../scripts/get_insurance.php",
                    dataType:"text",
                    data: myData,
                    success:function(response){
                        document.getElementById('result').innerHTML = "";
                        var result = JSON.parse(response);

                        result.forEach(function(element){
                            document.getElementById('result').innerHTML += '<tr class="product_card">' +
                                '<td>'+ element.name_institution + '<br>' +
                                '<img src="' + element.logo_institution + '" alt="" width = "125" height="125"' + '<br>' +
                                '<p><a style="font-size: 15px" data-toggle="collapse" data-target="#collapseExample' + element.id + '" aria-expanded="false" aria-controls="collapseExample">' +
                                'Подробности' +
                                '</a></p><div class="collapse"  id="collapseExample' + element.id + '">' +
                                element.details +
                                '</td>' +
                                '<td style="text-align: center; vertical-align: middle;">' + '<a title="element">' + element.risks + '</a></td>' +
                                '<td style="text-align: center; vertical-align: middle;">' + element.rating + '</td>' +
                                '<td class="active" style="text-align: center; vertical-align: middle;">' + element.price + '<br><button class=\"btn btn-success\" onclick=forward("' + element.name_institution + '");> Рассчитать стоимость</button>' + '</td>' +
                                '</tr>';
                        });

                    },
                    error:function (xhr, ajaxOptions, thrownError){
                        document.getElementById('result').innerHTML = '<b>Ошибка!</b>';
                    }
                });
            }

            function forward(name_institution){

                var mymodal = $('#myModalBox');
                mymodal.find('.modal-title').text("Заявление на комплексное страхование в " + name_institution);
                mymodal.modal('show');

            }
        </script>

    </head>
    <body onload="get_insurance()">
    <div id="myModalBox" class="modal fade modal_center">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="modal-title">Заявка на страхование</h4>
                </div>
                <div class="modal-body">
                    <form class="contact" name="form_id" id="form_id">
                        <div id="result_div_id"></div>
                        <div class="form-group">
                            <label class="sr-only" for="name_order">Ваше имя</label>
                            <input type="text" class="form-control" id="name_order" name="name_order" placeholder="Ваше имя">
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="phone_order">Ваш телефон</label>
                            <input type="tel" class="form-control" id="phone_order" name="phone_order" placeholder="Телефон">
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="inn_order">ОГРН организации/ОГРНИП</label>
                            <input type="text" class="form-control" id="inn_order" name="inn_order" placeholder="ОГРН организации/ОГРНИП">
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="url_order">Сайт организации (если есть)</label>
                            <input type="url" class="form-control" id="url_order" name="url_order" placeholder="Сайт организации (если есть)">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <a onclick="if (CheckFormSimple()) AjaxCallBack('result_div_id', 'form_id','modal-title','../../scripts/order.php');" class="btn btn-success">Отправить заявку<i class="icon-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    <header id="top-bar" class="navbar">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="navbar-brand">
                    <a href="../index.html" >
                        <img src="../images/logo.png" alt="" height="25">
                    </a>
                </div>
            </div>
            <nav class="collapse navbar-collapse navbar-right" role="navigation">
                <div class="main-menu">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="../finance/cash_service.php" class="dropdown-toggle" data-toggle="dropdown">Банковской обслуживание <b class="caret"></b></a>
                            <div class="dropdown-menu multi-column columns-3">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <ul class="multi-column-dropdown">
                                            <li><a href=""><strong>Обзоры</strong></a></li>
                                            <li class="divider"></li>
                                            <li><a href="../blog/top-finance/top-cash-service.html">Лучшие РКО 2017</a></li>
                                            <li><a href="../blog/top-finance/top-acquiring.html">Топ эквайрингов 2017</a></li>
                                            <li><a href="../blog/top-finance/top-deposits.html">Топ депозитов для бизнеса 2017</a></li>
                                            <li><a href="../blog/top-finance/top-currency.html">Топ валютный контроль 2017</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-4">
                                        <ul class="multi-column-dropdown">
                                            <li><a href=""><strong>Сравнение</strong></a></li>
                                            <li class="divider"></li>
                                            <li><a href="../finance/cash_service.php">РКО для бизнеса</a></li>
                                            <li><a href="../finance/acquiring.php">Эквайринг</a></li>
                                            <li><a href="../finance/deposits.php">Депозиты для бизнеса</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-4">
                                        <ul class="multi-column-dropdown">
                                            <li><a href=""><strong>Рекомендации</strong></a></li>
                                            <li class="divider"></li>
                                            <li><a href="../blog/bank-service/cash-service-choose.html">Как выбрать РКО?</a></li>
                                            <li><a href="../blog/bank-service/acquiring-online-shop.html">Эквайринг для интернет-магазина</a></li>
                                            <li><a href="../blog/bank-service/no_inflation.html">Избавляемся от инфляции</a></li>
                                            <li><a href="../blog/bank-service/mobile-acquiring.html">Мобильный эквайринг</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a href="../credit/credit.php" class="dropdown-toggle" data-toggle="dropdown">Кредитование<b class="caret"></b></a>
                            <div class="dropdown-menu multi-column columns-3">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <ul class="multi-column-dropdown">
                                            <li><a href=""><strong>Обзоры</strong></a></li>
                                            <li class="divider"></li>
                                            <li><a href="../blog/top-credit/top-credit-open.html">Топ на открытие бизнеса 2017</a></li>
                                            <li><a href="../blog/top-credit/top-credit-additional.html">Топ кредитов на пополнение капитала</a></li>
                                            <li><a href="../blog/top-credit/top-leasing.html">Топ лизинг автотранспорта 2017</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-4">
                                        <ul class="multi-column-dropdown">
                                            <li><a href=""><strong>Сравнение</strong></a></li>
                                            <li class="divider"></li>
                                            <li><a href="../credit/credit.php">Открытие бизнеса</a></li>
                                            <li><a href="../credit/credit-capital.php">Пополнение оборотного капитала</a></li>
                                            <li><a href="../credit/credit-mortgage.php">Коммерческая ипотека</a></li>
                                            <li><a href="../credit/credit-leasing.php">Лизинг</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-4">
                                        <ul class="multi-column-dropdown">
                                            <li><a href=""><strong>Рекомендации</strong></a></li>
                                            <li class="divider"></li>
                                            <li><a href="../blog/credit/get-credit.html">Как получить банковский кредит?</a></li>
                                            <li><a href="../blog/credit/credit-open-business.html">Деньги на открытие бизнеса</a></li>
                                            <li><a href="../blog/credit/credit-documents.html">Документы на получение кредита</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a href="../insurance/insurance_complex.php" class="dropdown-toggle" data-toggle="dropdown">Страхование <b class="caret"></b></a>
                            <div class="dropdown-menu multi-column columns-3">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <ul class="multi-column-dropdown">
                                            <li><a><strong>Обзоры</strong></a></li>
                                            <li class="divider"></li>
                                            <li><a href="../blog/top-insurance/top-realty.html">Топ страхования недвижимости</a></li>
                                            <li><a href="../blog/top-insurance/top-transport.html">Топ страхования транспорта</a></li>
                                            <li><a href="../blog/top-insurance/top-finance.html">Топ страхования финансовой деятельности</a></li>
                                            <li><a href="../blog/top-insurance/top-liability.html">Топ страхования ответственности</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-4">
                                        <ul class="multi-column-dropdown">
                                            <li><a><strong>Сравнение</strong></a></li>
                                            <li class="divider"></li>
                                            <li><a href="../insurance/insurance_realty.php">Недвижимость</a></li>
                                            <li><a href="../insurance/insurance_transport.php">Автотранспорт</a></li>
                                            <li><a href="../insurance/insurance_finance.php">Финансовая деятельность</a></li>
                                            <li><a href="../insurance/insurance_complex.php">Комплексное страхование</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-4">
                                        <ul class="multi-column-dropdown">
                                            <li><a><strong>Рекомендации</strong></a></li>
                                            <li class="divider"></li>
                                            <li><a href="../blog/insurance/choose-insurance.html">Как выбрать оптимальную страховку?</a></li>
                                            <li><a href="../blog/insurance/liability-insurance.html">Страхование ответственности</a></li>
                                            <li><a href="../blog/insurance/property-insurance.html">Страхование недвижимости</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a href="../investing/funds.php" class="dropdown-toggle" data-toggle="dropdown">Инвестиции <b class="caret"></b></a>
                            <div class="dropdown-menu multi-column columns-3" style="">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <ul class="multi-column-dropdown">
                                            <li><a><strong>Обзоры</strong></a></li>
                                            <li class="divider"></li>
                                            <li><a href="../blog/top-investment/top-venture.html">Топ венчурных фондов 2017</a></li>
                                            <li><a href="../blog/top-investment/top-brokers.html">Топ онлайн-брокеров 2017</a></li>
                                            <li><a href="../blog/top-investment/top-contest.html">Топ финансовых конкурсов 2017</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-4">
                                        <ul class="multi-column-dropdown">
                                            <li><a><strong>Сравнение</strong></a></li>
                                            <li class="divider"></li>
                                            <li><a href="../investing/funds.php">Венчурные фонды</a></li>
                                            <li><a href="../investing/brokers.php">Онлайн-брокеры</a></li>
                                            <li><a href="../investing/contest.php">Финансовые конкурсы</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-4">
                                        <ul class="multi-column-dropdown">
                                            <li><a><strong>Рекомендации</strong></a></li>
                                            <li class="divider"></li>
                                            <li><a href="../blog/investing/financial-statement.html">Как построить финансовую модель?</a></li>
                                            <li><a href="../blog/investing/prepare-pitch.html">Готовим питч</a></li>
                                            <li><a href="../blog/investing/investing-presentation.html">Как создать презентацию для инвестора?</a></li>
                                            <li><a href="../blog/investing/company-value.html">Оценка стоимости компании</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li><a href="../contact.html">Войти</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <div class="container">
        <div class="row fill">
            <div class="col-md-3">
                <a data-toggle="tooltip" title="Мы сохраняем строгую редакторскую оценку в наших обзорах. При этом мы получаем компенсацию, если вы переходите по ссылке на нашем сайте и заказываете услуги у наших партнеров." data-placement="bottom">Раскрытие информации</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-push-2 top-offset center-block">
                <h1><strong>Комплексное страхование для бизнеса</strong></h1>
                <p><i>Выбирайте лучшие варианты комплексного страхования для вашего бизнеса</i></p>
                <form onchange="changed_form()">
                    <div class="form-group">
                        <select id="type_insurance" class="selectpicker form-control">
                            <option value="transport">Страхование автотранспорта</option>
                            <option value="realty">Страхование недвижимости</option>
                            <option value="finance">Страхование финансовой деятельности</option>
                            <option value="complex" selected>Комплексное страхование бизнеса</option>
                        </select>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="col-xs-12">
            <table class="table">
                <thead>
                <tr>
                    <th class="col-sm-3 text-center active"><a href="">Организация</a></th>
                    <th class="col-sm-3 text-center active"><a href="">Страхуемые риски</a></th>
                    <th class="col-sm-3 text-center active"><a href="">Рейтинг организации</a></th>
                    <th class="col-sm-3 text-center active"><a href="">Стоимость</a></th>
                </tr>
                </thead>
                <tbody id="result" class="table-bordered"></tbody>
            </table>
        </div>
    </div>
        <footer id="footer">
            <div class="container copyright">
                <div class="col-md-8">
                    <div class="col-md-3">
                        <a href="../banks.html">Банкам</a>
                    </div>
                    <div class="col-md-3">
                        <a href="">Интеграция</a>
                    </div>
                    <div class="col-md-3">
                        <a href="">Оферта</a>
                    </div>
                    <div class="col-md-3">
                        <a href="">Контакты</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="social">
                        <li>
                            <a href="http://wwww.fb.com/themefisher" class="Facebook">
                                <i class="ion-social-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href="http://wwww.twitter.com/themefisher" class="Twitter">
                                <i class="ion-social-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="Linkedin">
                                <i class="ion-social-linkedin"></i>
                            </a>
                        </li>
                        <li>
                            <a href="http://wwww.fb.com/themefisher" class="Google Plus">
                                <i class="ion-social-googleplus"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </footer>
         </body>
     </html>