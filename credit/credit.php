<!DOCTYPE html>
<html class="no-js">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="icon" type="image/png" href="../images/favicon.ico">
        <title>Кредиты для малого и среднего бизнеса | Взять кредит на открытие бизнеса, пополнение капитала для юридических лиц и индивидуальных предпринимателей</title>
        <meta name="description" content="Подбор кредита для юридических лиц и ип на открытие и развитие бизнеса с залогом и без">
        <meta name="keywords" content="кредит, кредиты, сбербанк, тинькофф, альфа, втб, промсвязьбанк, малый, бизнес, с нуля, заем, получить, space, finance, spacefinance">
        <meta name="author" content="">

        <meta name="format-detection" content="telephone=no">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/font-awesome.min.css">
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

            function changed_form(){
                var pledge = $("#pledge" ).val();
                var interest_rate = $("#interest_rate" ).val();
                var credit_time = $("#credit_time" ).val();
                var max_credit = $("#max_credit" ).val();

                window.history.replaceState({}, "", updateQueryStringParameter(window.location.href,"pledge",pledge));
                window.history.replaceState({}, "", updateQueryStringParameter(window.location.href,"interest_rate",interest_rate));
                window.history.replaceState({}, "", updateQueryStringParameter(window.location.href,"credit_time",credit_time));
                window.history.replaceState({}, "", updateQueryStringParameter(window.location.href,"max_credit",max_credit));

                get_credit();

            }


            function updateQueryStringParameter(uri, key, value) {
                var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
                var separator = uri.indexOf('?') !== -1 ? "&" : "?";
                if (uri.match(re)) {
                    return uri.replace(re, '$1' + key + "=" + value + '$2');
                }
                else {
                    return uri + separator + key + "=" + value;
                }
            }

           function get_credit(){

               var myData={
                   pledge: getUrlVars()['pledge'],
                   interest_rate: getUrlVars()['interest_rate'],
                   credit_time: getUrlVars()['credit_time'],
                   max_credit: getUrlVars()['max_credit']
               };

               jQuery.ajax({
                   type: "GET",
                   url: "../scripts/get_credit.php",
                   dataType:"text",
                   data: myData,
                   success:function(response){
                       document.getElementById('result').innerHTML = "";
                       var result = JSON.parse(response);

                       result.forEach(function(element){
                           document.getElementById('result').innerHTML += '<tr class="product_card">' +
                               '<td>'+ element.name_institution + ' (' + element.name_tariff + ') <br>' +
                               '<img src="../images/logo/' + element.logo_institution + '" alt="" width = "125" height="125"' + '<br>' +
                               '</td>' +
                               '<td style="text-align: center; vertical-align: middle;">от ' + element.interest_rate + '%</td>' +
                               '<td style="text-align: center; vertical-align: middle;">до ' + element.credit_time + ' мес.</td>' +
                               '<td class="active" style="text-align: center; vertical-align: middle;">' + element.max_credit + ' млн. руб.<br><button class=\"btn btn-success\" onclick="forward(\'' + element.id + '\',\'' + element.name_institution + '\')"> Подать заявку на кредит</button>' + '</td>' +
                               '</tr>' +
                               '<tr><td style="border: none" colspan="3"><a style="font-size: 15px; cursor: pointer" data-toggle="collapse" data-target="#collapseExample' + element.id + '" aria-expanded="false" aria-controls="collapseExample">' +
                               'Особенности' +
                               '</a><div class="collapse"  id="collapseExample' + element.id + '"><p>' +
                               element.details +
                               '</p></td><td style="border: none" class="active"></td></tr>';
                       });

                   },
                   error:function (xhr, ajaxOptions, thrownError){
                       document.getElementById('result').innerHTML = '<b>Ошибка!</b>';
                   }
               });
            }

            function forward(order_id, name_institution){

                var mymodal = $('#myModalBox');
                mymodal.find('.modal-title').text("Заявление на кредитование в " + name_institution);
                mymodal.modal('show');

            }

        </script>

    </head>
    <body onload="get_credit()">
    <div id="myModalBox" class="modal fade modal_center">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="modal-title">Заявка на РКО</h4>
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
                <div class="navbar-brand hidden-sm">
                    <a href="../index.html" >
                        <img src="../images/logo.png" alt="" height="35">
                    </a>
                </div>
            </div>
            <nav class="collapse navbar-collapse navbar-right" role="navigation">
                <div class="main-menu">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown" style="position: static">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Банковской обслуживание <b class="caret"></b></a>
                            <div class="dropdown-menu multi-column columns-3">
                                <div class="row col-md-offset-2 col-md-8">
                                    <div class="col-sm-4 col-md-4">
                                        <ul class="multi-column-dropdown">
                                            <li><a href=""><strong>Обзоры</strong></a></li>
                                            <li class="divider"></li>
                                            <li><a href="../blog/top-finance/top-cash-service.html">Лучшие РКО 2017</a></li>
                                            <li><a href="../blog/top-finance/top-acquiring.html">Топ эквайрингов 2017</a></li>
                                            <li><a href="../blog/top-finance/top-deposits.html">Топ депозитов для бизнеса 2017</a></li>
                                            <li><a href="../blog/top-finance/top-currency.html">Топ валютный контроль 2017</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-4 col-md-4">
                                        <ul class="multi-column-dropdown">
                                            <li><a href=""><strong>Сравнение</strong></a></li>
                                            <li class="divider"></li>
                                            <li><a href="../finance/cash_service.php">РКО для бизнеса</a></li>
                                            <li><a href="../finance/acquiring.php">Эквайринг</a></li>
                                            <li><a href="../finance/deposits.php">Депозиты для бизнеса</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-4 col-md-4">
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
                        <li class="dropdown" style="position: static">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Кредитование<b class="caret"></b></a>
                            <div class="dropdown-menu multi-column columns-3">
                                <div class="row col-md-offset-2 col-md-8">
                                    <div class="col-sm-4 col-md-4">
                                        <ul class="multi-column-dropdown">
                                            <li><a href=""><strong>Обзоры</strong></a></li>
                                            <li class="divider"></li>
                                            <li><a href="../blog/top-credit/top-credit-open.html">Топ на открытие бизнеса 2017</a></li>
                                            <li><a href="../blog/top-credit/top-credit-additional.html">Топ кредитов на пополнение капитала</a></li>
                                            <li><a href="../blog/top-credit/top-leasing.html">Топ лизинг автотранспорта 2017</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-4 col-md-4">
                                        <ul class="multi-column-dropdown">
                                            <li><a href=""><strong>Сравнение</strong></a></li>
                                            <li class="divider"></li>
                                            <li><a href="../credit/credit.php">Открытие бизнеса</a></li>
                                            <li><a href="../credit/credit-capital.php">Пополнение оборотного капитала</a></li>
                                            <li><a href="../credit/credit-mortgage.php">Коммерческая ипотека</a></li>
                                            <li><a href="../credit/credit-leasing.php">Лизинг</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-4 col-md-4">
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
                        <li class="dropdown" style="position: static">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Страхование <b class="caret"></b></a>
                            <div class="dropdown-menu multi-column columns-3">
                                <div class="row col-md-offset-2 col-md-8">
                                    <div class="col-sm-4 col-md-4">
                                        <ul class="multi-column-dropdown">
                                            <li><a><strong>Обзоры</strong></a></li>
                                            <li class="divider"></li>
                                            <li><a href="../blog/top-insurance/top-realty.html">Топ страхования недвижимости</a></li>
                                            <li><a href="../blog/top-insurance/top-transport.html">Топ страхования транспорта</a></li>
                                            <li><a href="../blog/top-insurance/top-finance.html">Топ страхования финансовой деятельности</a></li>
                                            <li><a href="../blog/top-insurance/top-liability.html">Топ страхования ответственности</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-4 col-md-4">
                                        <ul class="multi-column-dropdown">
                                            <li><a><strong>Сравнение</strong></a></li>
                                            <li class="divider"></li>
                                            <li><a href="../insurance/insurance_realty.php">Недвижимость</a></li>
                                            <li><a href="../insurance/insurance_transport.php">Автотранспорт</a></li>
                                            <li><a href="../insurance/insurance_finance.php">Финансовая деятельность</a></li>
                                            <li><a href="../insurance/insurance_complex.php">Комплексное страхование</a></li>

                                        </ul>
                                    </div>
                                    <div class="col-sm-4 col-md-4">
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
                        <li class="dropdown" style="position: static">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Инвестиции <b class="caret"></b></a>
                            <div class="dropdown-menu multi-column columns-3" style="">
                                <div class="row col-md-offset-2 col-md-8">
                                    <div class="col-sm-4 col-md-4">
                                        <ul class="multi-column-dropdown">
                                            <li><a><strong>Обзоры</strong></a></li>
                                            <li class="divider"></li>
                                            <li><a href="../blog/top-investment/top-venture.html">Топ венчурных фондов 2017</a></li>
                                            <li><a href="../blog/top-investment/top-brokers.html">Топ онлайн-брокеров 2017</a></li>
                                            <li><a href="../blog/top-investment/top-contest.html">Топ финансовых конкурсов 2017</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-4 col-md-4">
                                        <ul class="multi-column-dropdown">
                                            <li><a><strong>Сравнение</strong></a></li>
                                            <li class="divider"></li>
                                            <li><a href="../investing/funds.php">Венчурные фонды</a></li>
                                            <li><a href="../investing/brokers.php">Онлайн-брокеры</a></li>
                                            <li><a href="../investing/contest.php">Финансовые конкурсы</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-4 col-md-4">
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
                          <h1><strong>Кредитование вашего бизнеса</strong></h1>
                          <p><i>Подберите бизнес-кредит на любые цели</i></p>
                       </div>
                    </div>
    </div>
    <form onchange="changed_form()">
    <div class="container">
        <div class="row">
            <div class="col-xs-3">
                <div class="form-group">
                    <label for="pledge">Требование обеспечения</label>
                    <select id="pledge" class="selectpicker form-control" onchange="">
                        <option value="yes">Есть</option>
                        <option value="no" selected>Нет</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-3">
                <div class="form-group">
                    <label for="interest_rate">Процентная ставка</label>
                    <select id="interest_rate" class="selectpicker form-control">
                        <option value="100" selected>Любая</option>
                        <option value="10">До 10%</option>
                        <option value="20">До 20%</option>
                        <option value="30">До 30%</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-3">
                <div class="form-group">
                    <label for="credit_time">Срок кредитования</label>
                    <select id="credit_time" class="selectpicker form-control">
                        <option value="360" selected>Любой</option>
                        <option value="3">до 3 месяцев</option>
                        <option value="12">до 12 месяцев</option>
                        <option value="24">до 24 месяцев</option>
                        <option value="48">до 48 месяцев</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-3">
                <div class="form-group">
                    <label for="max_credit">Максимальная сумма кредита</label>
                    <select id="max_credit" class="selectpicker form-control">
                        <option value="10000" selected>Любая</option>
                        <option value="0.1">До 100 тыс. руб.</option>
                        <option value="3">До 3 млн. руб.</option>
                        <option value="10">До 10 млн. руб.</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    </form>
    <div class="container">
    <div class="col-md-12">
        <table class="table">
            <thead>
            <tr>
                <th class="col-sm-3 text-center active"><a href="">Банк</a></th>
                <th class="col-sm-3 text-center active"><a href="">Процентная ставка</a></th>
                <th class="col-sm-3 text-center active"><a href="">Срок кредитования</a></th>
                <th class="col-sm-3 text-center active"><a href="">Максимальная сумма кредита</a></th>
            </tr>
            </thead>
            <tbody id="result" class="table-bordered"></tbody>
        </table>
    </div>
</div>
    <footer id="footer">
        <div class="container copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="col-md-3">
                            <p><a href="../finance/cash_service.php">Банковское обслуживание</a></p>
                            <p><a href="../credit/credit.php">Кредитование</a></p>
                            <p><a href="../insurance/insurance_complex.php">Страхование</a></p>
                            <p><a href="../investing/funds.php">Инвестиции</a></p>
                        </div>
                        <div class="col-md-3">
                            <p><a href="../accomodation.html">Размещение на портале</a></p>
                            <p><a href="../integration.html">Интеграция</a></p>
                            <p><a href="../api.html">API</a></p>
                        </div>
                        <div class="col-md-3">
                            <p><a href="../documents/politic.pdf" target="_blank">Политика конфиденциальности</a></p>
                            <p><a href="../documents/rules.pdf" target="_blank">Правила сервиса</a></p>
                            <p><a href="../documents/rules.pdf" target="_blank">Условия использования</a></p>
                        </div>
                        <div class="col-md-3">
                            <p><a href="../about.html">О компании</a></p>
                            <p><a href="../partnership.html">Сотрудничество</a></p>
                            <p><a href="../press.html">Пресса</a></p>
                            <p><a href="../career.html">Карьера</a></p>
                            <p><a href="../projects.html">Проекты</a></p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <ul class="social">
                            <li>
                                <a href="https://www.facebook.com/spacefinance/" class="Facebook">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://vk.com/spacefinance" class="Facebook">
                                    <i class="fa fa-vk"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="Twitter">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="Google Plus">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <p style="text-align: left; font-size: 13px; color: #ffffff; line-height: 1.2;">
                            Ответственность: SpaceFinance ежедневно стремится, чтобы информация была точной и актуальной. Информация на сайте может отличаться от информации на сайте финансового института, поставщика услуг или конкретного сайта продукта.
                            Все финансовые продукты и услуги представлены без гарантии. Услуги представлены в ознакомительных целях. Обязательно проверяйте актуальность данных на официальных сайтах партнеров.
                            Если вы обнаружите несоответствия, пожалуйста, свяжитесь с нами напрямую info@spacefinance.net.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function (d, w, c) {
            (w[c] = w[c] || []).push(function() {
                try {
                    w.yaCounter44226269 = new Ya.Metrika({
                        id:44226269,
                        clickmap:true,
                        trackLinks:true,
                        accurateTrackBounce:true,
                        webvisor:true,
                        ecommerce:"dataLayer"
                    });
                } catch(e) { }
            });

            var n = d.getElementsByTagName("script")[0],
                s = d.createElement("script"),
                f = function () { n.parentNode.insertBefore(s, n); };
            s.type = "text/javascript";
            s.async = true;
            s.src = "https://mc.yandex.ru/metrika/watch.js";

            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else { f(); }
        })(document, window, "yandex_metrika_callbacks");
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/44226269" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-42988665-6', 'auto');
        ga('send', 'pageview');

    </script>
         </body>
     </html>