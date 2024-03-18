<div>
    <div style="width: 70%; margin-left: 15%;" id="DivIdToPrint">
        <div>
    <div style="clear:both;">
        <p style="margin-top:0pt; margin-bottom:0pt; line-height:normal;">&nbsp;</p>
    </div>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:center;"><strong><span style="color:#0f243e;">ПРЕДВАРИТЕЛЬНЫЙ ДОГОВОР</span></strong></p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:center;"><strong><span style="color:#0f243e;">купли-продажи квартиры №<?php echo e($data['contract_number']); ?></span></strong></p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:center;"><strong><span style="color:#0f243e;">&nbsp;</span></strong></p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-indent:13.95pt; text-align:justify;">Настоящий предварительный договор купли-продажи квартиры <u>(&laquo;Договор&raquo;)</u> заключен</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-indent:13.95pt; text-align:justify;"><?php echo e(date('d..Y', strtotime($data['date_deal']))); ?> г. в городе Ош, Кыргызская Республика, между:</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-indent:13.95pt; text-align:justify;"><span style="width:289.8pt; text-indent:0pt; display:inline-block;">&nbsp;</span></p>
    <p style="font-size: 12pt; margin-top:0pt; margin-right:2.1pt; margin-bottom:6pt; text-align:justify;"><strong>1. Обществом с ограниченной ответственностью &laquo;</strong><strong><span style="color:#0f243e;"><?php echo e($data['company_name']); ?></span></strong><strong>&raquo;,&nbsp;</strong>в лице генерального директора <strong><span style="color:#0f243e;"><?php echo e($data['company_director']); ?></span></strong><strong>,</strong> действующего на основании Устава и Приказа №1, здесь и далее именуемый <strong>&laquo;Продавец&raquo;,&nbsp;</strong>с одной стороны,</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;"><strong>2. Гражданином (ой) Кыргызкой Республики&nbsp;</strong><?php echo e($data['last_name']); ?> <?php echo e($data['first_name']); ?> <?php echo e($data['middle_name']); ?><strong>,</strong><strong>
    <?php 
        if (!empty($data['birth_date'])) {
            echo date('d.m.Y', strtotime($data['birth_date']));
        }
    ?>,
    &nbsp;</strong>года рождения, паспорт серии <strong><span style="color:#0f243e;"><?php echo e($data['series_number']); ?>&nbsp;</span></strong>от <strong><span style="color:#0f243e;"><?php echo e(date('d.m.Y', strtotime($data['given_date']))); ?></span></strong>, <strong>выдан&nbsp;</strong><strong><span style="color:#0f243e;"><?php echo e($data['issued_by']); ?></span></strong><strong>, ИНН <?php echo e($data['company_inn']); ?>&nbsp;</strong>проживающий по адресу:<?php echo e($data['company_address']); ?>, здесь и далее именуемый (ой)<span style="color:#ff0000;">&nbsp;</span><strong>&laquo;Покупатель&raquo;</strong>, с другой стороны, а вместе здесь и далее именуемые <strong>&laquo;Стороны&raquo;</strong>,</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">&nbsp;</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;"><strong>ПОСКОЛЬКУ:</strong><strong><span style="width:207.4pt; display:inline-block;">&nbsp;</span></strong></p>
    <p style="font-size: 12pt; margin-top:6pt; margin-bottom:0pt; text-align:justify;">1) Продавец имеет намерение продать Покупателю, а Покупатель имеет намерение купить у Продавца квартиру в многоквартирном жилом комплексе <strong>&laquo;</strong><strong><span style="color:#0f243e;"><?php echo e($data['company_name']); ?></span></strong><strong>&raquo;,</strong> расположенный по адресу: <?php echo e($data['company_address']); ?>(далее &ndash; &laquo;объект&raquo;), после сдачи объекта в эксплуатацию по завершении строительства.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">2) Стороны могут заключить основной договор купли-продажи квартиры только после завершения строительства объекта и сдачи его в эксплуатацию, на основании вышеизложенного, с целью закрепления своих намерений, Стороны пришли к решению заключить предварительный договор купли-продажи квартиры о нижеследующем:</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;"><em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</em><em>Настоящим Покупатель подтверждает, что перед заключением настоящего Договора, текст Договора им полностью прочитан, язык на котором составлен Договор, как и иные условия Договора понятны полностью, а также ему понятны права и обязанности по Договору. Подписанием настоящего Договора, а также иных необходимых документов, связанных с исполнением Договора, Стороны подтверждают, что не находятся в состоянии алкогольного, наркотического и/или иного опьянения, а находятся в состоянии вменяемости, трезво и разумно осознают суть всех условий Договора и значение заключаемой друг с другом сделки. Стороны гарантируют, что обладают необходимой правосубъективностью и правоспособностью и иными необходимыми полномочиями для заключения настоящего Договора, а также не состоят под опекой и попечительством, не страдают заболеваниями, препятствующими осознать суть Договора, а также отсутствуют обстоятельства, вынуждающие заключать Договор на крайне невыгодных для себя условиях.</em></p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:8pt; text-align:justify;"><em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</em><em>Вместе с тем, Стороны подтверждают, что содержание и смысл условий, отраженных в Договоре, соответствует их действительному волеизъявлению и намерениям.</em></p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:8pt; text-align:justify;">Стороны, определили термины и определения, используемые в Договоре:</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:8pt; text-align:justify;"><strong>Продавец &ndash;&nbsp;</strong>юридическое лицо/застройщик (ОсОО &laquo;Бизнес Хаус КГ&raquo;), которое осуществляет продажу строящихся/построенных объектов недвижимости (квартир/нежилых помещений) в пользу Покупателей за определённое Договором вознаграждение.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:8pt; text-align:justify;"><strong>Покупатель &ndash;&nbsp;</strong>физическое/юридическое лицо, имеющее намерение приобрести в собственность квартиру/нежилое помещение у Продавца на возмездной основе и на условиях, предусмотренных Договором для удовлетворения потребительских, личных нужд.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:8pt; text-align:justify;"><strong>Управляющая организация</strong> - организация (юридическое лицо), профессионально и на возмездной основе занимающаяся содержанием, обслуживанием и ремонтом общего имущества в многоквартирном доме.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:8pt; text-align:justify;"><strong>Государственное учреждение &laquo;Кадастр&raquo; (Ошский филиал Государственного учреждения &laquo;Кадастр&raquo;) &ndash;&nbsp;</strong>уполномоченный государственный орган, осуществляющий регистрацию прав на недвижимое имущество в установленном законодательством порядке.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:8pt; text-align:justify;"><strong>Основной договор -</strong>это договор купли-продажи квартиры/нежилого помещения, оформляемый и регистрируемый в Государственном учреждении &laquo;Кадастр&raquo;, по которому одна сторона (продавец) обязуется передать имущество другой (покупателю), получив за него определенную денежную сумму согласно условиям Договора.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-left:36pt; margin-bottom:0pt; line-height:108%;"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong><strong>1.ПРЕДМЕТ ДОГОВОРА</strong></p>
    <p style="font-size: 12pt; margin-top:0pt; margin-left:36pt; margin-bottom:0pt;"><strong>&nbsp;</strong></p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">1.1. Продавец обязуется продать, а Покупатель приобрести в собственность недвижимое имущество, <?php echo e($data['room_count']); ?>комнатную квартиру, общей площадью <strong><?php echo e($data['total_m2']); ?>кв. м,</strong> предварительный номер квартиры: №<strong><?php echo e($data['number_of_flat']); ?>, <?php echo e($data['floor']); ?> этаж</strong>, <strong><?php echo e($data['corpus']); ?> блок,</strong> в многоквартирном жилом комплексе <strong>&laquo;<?php echo e($data['company_name']); ?>&raquo;</strong>, строящемся по адресу: <strong><?php echo e($data['company_address']); ?></strong>(далее &ndash; &laquo;квартира&raquo;).</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">1.2. Настоящий договор является предварительным. Стороны обязуются заключить основной договор купли-продажи квартиры в течение 60 (шестидесяти) календарных дней после сдачи в эксплуатацию многоквартирного жилого дома и регистрации права собственности Продавца на квартиру или в иной срок готовности оформления квартиры, о чем Покупатель будет предварительно уведомлен Продавцом в порядке, предусмотренном Договором, в государственном органе, осуществляющем регистрацию прав на недвижимое имущество (далее &ndash; &laquo;ГУ Кадастр&raquo;) в порядке установленном законодательством.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">1.3. После замера ГУ &ldquo;Кадастр&rdquo; указанная в Предварительном Договоре купли-продажи общая продаваемая площадь квартиры может иметь допустимую погрешность по количеству квадратных метров в сторону увеличения или уменьшения не более чем на 2 (два) кв.м., что не является ненадлежащим исполнением Продавцом обязательств по настоящему Договору.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">1.4. Покупатель приобретает право собственности на недвижимое имущество после подписания между Сторонами в установленные настоящим Договором сроки основного договора купли-продажи, который подлежит регистрации в ГУ &ldquo;Кадастр&rdquo;.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">&nbsp;</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:center;"><strong>&nbsp;</strong></p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:center;"><strong>&nbsp;</strong></p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:center;"><strong>&nbsp;</strong></p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:center;"><strong>&nbsp;</strong></p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:center;"><strong>2. СУЩЕСТВЕННЫЕ УСЛОВИЯ И ПОРЯДОК ЗАКЛЮЧЕНИЯ</strong></p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:center;"><strong>ОСНОВНОГО И ПРЕДВАРИТЕЛЬНОГО ДОГОВОРА КУПЛИ ПРОДАЖИ КВАРТИРЫ</strong></p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:center;"><strong>&nbsp;</strong></p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">2.1. Стороны определили следующие существенные условия основного договора купли-продажи Квартиры:</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">2.1.1. Предмет договора &ndash; квартира общей площадью <strong><?php echo e($data['total_m2']); ?>кв. м</strong>, что включает в себя жилые(ую) комнаты(у), кухню, ванную(ые) комнату(ы), прихожую, балконы, лоджии, гардеробные помещения, оборудованные согласно перечня, прилагаемого к настоящему Договору и являющегося неотъемлемой частью настоящего Договора (Приложение №2). Отсутствие в документах, оформляемых органами ГУ &ldquo;Кадастр&rdquo; указания на площади балконов, лоджий, террас в составе полезной площади Квартиры, не является ненадлежащим исполнением обязательств Продавцом.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">2.1.2. Реализуемая стоимость квартиры определена Сторонами в сумме, с учетом налогов <strong><?php echo e(number_format($data['price_sell'])); ?> ( <?php echo e($data['price_sell_word']); ?> )</strong>) <strong>долларов США</strong>, из расчета $<strong><?php echo e(number_format($data['price_sell_m2'])); ?> <?php echo e($data['price_sell_m2_words']); ?>долларов США,</strong> за 1 (один) кв.м. площади приобретаемой квартиры по Договору.&nbsp;&nbsp; Указанная стоимость квадратного метра не подлежит изменению сторонами в одностороннем порядке.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">2.1.3. Покупатель производит оплату стоимости квартиры в долларах США или в национальной валюте по рыночному курсу (Кыргызской Республики) на день осуществления платежа, в сроки, указанные в графике выплаты денежных средств, прилагаемого к настоящему Договору и являющегося его неотъемлемой частью (Приложение № 1).</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">2.1.4. Все расходы по заключению основного и/или предварительного договора купли-продажи квартиры и его регистрацию в ГУ &ldquo;Кадастр&rdquo; оплачивает Покупатель в полном объеме.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">2.2. Квартиры предоставляются под самоотделку.&nbsp;</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">2.3. Гарантия на оборудование в квартире (приборы учета) при условии правильной эксплуатации Продавцом и отсутствия форс-мажоров составляет 1 (один) год.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;"><em>Вышеуказанный срок гарантии исчисляется с момента подписания Сторонами Акта приема-передачи квартиры.</em></p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;"><em><span style="color:#00b0f0;">&nbsp;</span></em></p>
    <p style="font-size: 12pt; margin-top:0pt; margin-left:36pt; margin-bottom:0pt; line-height:108%;"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong><strong>3.ПРАВА И ОБЯЗАННОСТИ СТОРОН</strong></p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:center;"><strong>&nbsp;</strong></p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;"><strong>3.1. Продавец по настоящему Договору обязуется:</strong></p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">3.1.1. Передать Покупателю квартиру, оборудованную согласно Приложению № 2, по акту приема-передачи квартиры в течение 36 (тридцати шести) месяцев с момента получения разрешения на строительство. При этом Стороны согласились, что с момента подписания акта приема передачи, указанного в настоящем пункте, все риски гибели/порчи Квартиры и находящегося в ней оборудования, имущества &ndash; переходят к Покупателю.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">3.1.2. Заключить с Покупателем основной договор купли-продажи квартиры в порядке и сроки, установленные п. 1.2. настоящего Договора.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">3.1.3. В случае расторжения настоящего Договора в одностороннем порядке не по вине Продавца, в том числе по причине ненадлежащего исполнения Покупателем обязательств по настоящему Договору, или если одностороннее расторжение Договора произведено Покупателем при отсутствии оснований, предусмотренных настоящим Договором, осуществление возврата оплаченных Покупателем денежных средств Покупателю производится только после реализации Продавцом указанной квартиры третьим лицам.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">3.1.4. Подключить и передать лифтовое оборудование ТСЖ, что производится в следующем порядке:</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">- Покупатель согласно п.п. 3.3.6 настоящего Договора совместно с другими собственниками многоэтажного жилого дома обеспечивает создание и регистрацию ТСЖ;</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">- ТСЖ заключает договор с эксплуатирующей организацией на техническое обслуживание лифтов;</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">- ТСЖ нанимает (назначает) специалиста ответственного за техническое обслуживание лифта &ndash; лифтер;</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">- Наличие диспетчеризации лифтов (производится во время строительно-монтажных работ Продавцом).</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">&nbsp;&nbsp;&nbsp; После получения акта приемки лифтового оборудования в эксплуатацию Госгортехнадзором, Продавец подключает лифты, и они считаются готовыми к использованию.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;"><strong>3.2. Продавец по настоящему Договору имеет право:</strong></p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">3.2.1. Требовать от Покупателя, надлежащего исполнения обязательств по настоящему Договору.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">3.2.2. В случае задержки передачи квартиры согласно п.п. 3.1.1. Договора Продавец имеет право на отсрочку равную 60 (шестьдесят) рабочих дней без уплаты пени Покупателю, о чем последний уведомлен при подписании настоящего Договора и с чем согласен.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">3.2.3. Требовать от Покупателя компенсацию, если общая продаваемая площадь Квартиры превышает допустимую норму отклонения от площади Квартиры, установленную пунктом 1.3. настоящего Договора, и составляет более &ndash; 2 (двух) кв.м., исходя из цены за 1 кв.м. указанной п. 2.1.2. настоящего Договора.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">3.2.4. Закончить строительство объекта досрочно. В этом случае Покупатель обязуется оплатить полную стоимость квартиры, независимо от срока рассрочки оплаты, определенной в Приложении № 1, а Продавец вправе потребовать от Покупателя полной оплаты стоимости Квартиры также досрочно. При невозможности и несостоятельности оплаты досрочно Покупателем, Продавец разрешает произвести оплату согласно графику платежей (Приложение № 1), с условием того, что в случае, если Покупатель не сможет выплатить стоимость Квартиры по завершению графика, Продавец вправе отказаться от исполнения настоящего Договора, а Покупатель обязан незамедлительно освободить Квартиру во внесудебном порядке.&nbsp; При этом Квартира остается в собственности Продавца без возмещения внесенных неотделимых улучшений Покупателю согласно условиям настоящего Договора, и Продавец вправе реализовать ее третьим лицам по своему усмотрению, с наступлением последствий, предусмотренных пунктом 3.1.3. настоящего Договора.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">3.2.5. Продавец имеет право устанавливать и изменять в любую сторону стоимость аналогичных Квартир, которые не являются предметом взаимоотношений Продавца и Покупателя по настоящему Договору, и реализовывать их по иной стоимости, вне зависимости от стоимости (цен), по которой заключен настоящий Договор, а также не связан условиями договоров, заключенных с другими Покупателями на аналогичные Квартиры ранее при определении условий настоящего Договора в отношении цены.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">3.2.6. Не передавать квартиру по акту приема передачи Покупателю, до полного погашения задолженности по оплате, в соответствии с условиями настоящего Договора.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">3.2.7. Стороны договорились, что Продавец вправе в одностороннем порядке уступить Финансовому агенту (Банку или иной финансово-кредитной организации) право денежного требования к Покупателю без предварительного уведомления Покупателя, на основании заключенного между Продавцом и финансовым агентом соответствующего соглашения. При этом Продавец обязуется уведомить Покупателя о состоявшейся уступке Банку или иной финансово-кредитной организации своего права денежного требования в течение 5 (пяти) рабочих дней.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">3.2.8. Продавец по своему усмотрению вправе до момента перехода права собственности на квартиру по Договору на Покупателя, устраивать различные акции и/или розыгрыши, предусматривающие скидки, в период действия такой акции, по внесению денежных взносов на приобретение квартиры по Договору. Условия акции будут отражены в отдельном дополнительном соглашении к Договору.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">3.2.9. В случае внесения изменений в Налоговый кодекс Кыргызской Республики, если такие изменения повлекут для Продавца необходимость уплаты суммы налогов от продажи Квартиры больше чем, если бы Продавец уплачивал до внесения таких изменений, Покупатель обязан доплатить такую разницу Продавцу.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;"><strong>3.3. Покупатель по настоящему Договору обязуется:</strong></p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">3.3.1. Осуществлять оплату стоимости квартиры в порядке и сроки, предусмотренные настоящим Договором.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">3.3.2. Принять квартиру под самоотделку, по акту приема-передачи в течение &ndash; 7 (семи) календарных дней, с момента уведомления Продавцом. (смс, эл. Письмо, эл. Сообщение и т.д.).</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">3.3.3. В случае если у Покупателя при подписании акта приема передачи квартиры возникают замечания к качеству тех или иных работ, то Покупатель незамедлительно должен сообщить Продавцу, согласовать сроки исправления таких замечаний, которые прописываются на бланке акта приема передачи квартиры.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify; line-height:normal;">3.3.4. Завершить отделочные работы в течение 120 (ста двадцати) календарных дней, со дня уведомления Продавцом о готовности передачи квартиры. (смс, эл. письмо, эл. Сообщение и т.д.).</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify; line-height:normal;">3.3.5. При осуществлении &laquo;чистовой отделки&raquo; Покупатель обязан:</p>
    <ul type="disc" style="margin:0pt; padding-left:0pt;">
        <li style="margin-left:26.86pt; margin-bottom:8pt; text-align:justify; line-height:normal; padding-left:9.14pt; font-family:serif;"><span style="font-family:'Times New Roman';">работать только исправными электроинструментами;</span></li>
        <li style="margin-left:26.86pt; margin-bottom:8pt; text-align:justify; line-height:normal; padding-left:9.14pt; font-family:serif;"><span style="font-family:'Times New Roman';">не применять электроприборы не заводского исполнения;</span></li>
        <li style="margin-left:26.86pt; margin-bottom:8pt; text-align:justify; line-height:normal; padding-left:9.14pt; font-family:serif;"><span style="font-family:'Times New Roman';">не применять б/у электрокабеля;</span></li>
        <li style="margin-left:26.86pt; margin-bottom:8pt; text-align:justify; line-height:normal; padding-left:9.14pt; font-family:serif;"><span style="font-family:'Times New Roman';">не допускать приготовление пищи в квартире во время отделочных работ;</span></li>
        <li style="margin-left:26.86pt; margin-bottom:8pt; text-align:justify; line-height:normal; padding-left:9.14pt; font-family:serif;"><span style="font-family:'Times New Roman';">не допускать своих рабочих в электрощитовую без разрешения Продавца;</span></li>
        <li style="margin-left:26.86pt; margin-bottom:8pt; text-align:justify; line-height:normal; padding-left:9.14pt; font-family:serif;"><span style="font-family:'Times New Roman';">не допускать ночевку в квартире;</span></li>
        <li style="margin-left:26.86pt; margin-bottom:8pt; text-align:justify; line-height:normal; padding-left:9.14pt; font-family:serif;"><span style="font-family:'Times New Roman';">не допускать употребление спиртных напитков;</span></li>
        <li style="margin-left:26.86pt; margin-bottom:8pt; text-align:justify; line-height:normal; padding-left:9.14pt; font-family:serif;"><span style="font-family:'Times New Roman';">не допускать разведение открытого огня, сжигание мусора;</span></li>
        <li style="margin-left:26.86pt; margin-bottom:8pt; text-align:justify; line-height:normal; padding-left:9.14pt; font-family:serif;"><span style="font-family:'Times New Roman';">на лестничных площадках, а также в лифтах и на всех участках многоэтажного жилого дома соблюдать чистоту и порядок;</span></li>
        <li style="margin-left:26.86pt; margin-bottom:8pt; text-align:justify; line-height:normal; padding-left:9.14pt; font-family:serif;"><span style="font-family:'Times New Roman';">обеспечить нанятых рабочих для произведения отделочных работ в Квартире средствами индивидуальной защиты (СИЗ);</span></li>
        <li style="margin-left:26.86pt; margin-bottom:8pt; text-align:justify; line-height:normal; padding-left:9.14pt; font-family:serif;"><span style="font-family:'Times New Roman';">нести полную индивидуальную ответственность за действия/бездействия, безопасность, а также вред, причиненный жизни и здоровью нанятых рабочих для выполнения &laquo;чистовой отделки&raquo;, а также гарантировать соблюдение нанятыми рабочими Техники безопасности на объекте;</span></li>
        <li style="margin-left:26.86pt; margin-bottom:8pt; text-align:justify; line-height:normal; padding-left:9.14pt; font-family:serif;"><span style="font-family:'Times New Roman';">обеспечить прохождение перед началом работ наемными рабочими инструктаж по Технике Безопасности у прорабов на Объекте, о чем будет отмечено в журнале по Технике Безопасности.</span></li>
        <li style="margin-left:26.86pt; margin-bottom:8pt; text-align:justify; line-height:normal; padding-left:9.14pt; font-family:serif;"><span style="font-family:'Times New Roman';">во время осуществления работ по &laquo;чистовой отделке&raquo; квартиры без письменного согласия Продавца не разрушать и не изменять в квартире перегородки, несущие конструкции, внутренние инженерные сети. Если Покупатель решит самовольно изменить, передвинуть или заменить внутренние инженерные сети то Продавец не несет ответственности за сохранность и функциональность этих сетей.</span></li>
        <li style="margin-left:26.86pt; margin-bottom:8pt; text-align:justify; line-height:normal; padding-left:9.14pt; font-family:serif;"><span style="font-family:'Times New Roman';">при желании Покупателя произвести перепланировку в квартире, он обязуется согласовать ее с Продавцом, по утверждении Продавцом проведения Покупателем перепланировки в квартире, последний уведомлен о возможности изменения площади квартиры в сторону уменьшения/увеличения, за что, Продавец не несет ответственность и считается выполнившим свои обязательства надлежащим образом.&nbsp;</span></li>
        <li style="margin-left:26.86pt; margin-bottom:8pt; text-align:justify; line-height:normal; padding-left:9.14pt; font-family:serif;"><span style="font-family:'Times New Roman';">обеспечить беспрепятственный доступ представителя Продавца в квартиру.</span></li>
    </ul>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">3.3.5.1. Заключить с Продавцом основной договор купли-продажи квартиры в ГУ &ldquo;Кадастр&rdquo; (при необходимости в нотариальной конторе) в порядке и сроки, предусмотренные настоящим Договором.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">3.3.6. До оформления права собственности на Покупателя Квартиру в ГУ &ldquo;Кадастр&rdquo;, Покупатель обязуется оплачивать коммунальные услуги по коммерческим тарифам (энергоснабжение, отопление, водоснабжение, лифт, газ и пр.) за Квартиру и места общего пользования с момента официального уведомления&nbsp; Продавцом, о готовности Квартиры к передаче Покупателю, согласно счетов на оплату, которые поступают и будут поступать в офис Продавца, в том числе в случае, когда Покупатель не исполняет обязательства по приемке Квартиры в порядке, установленном настоящим Договором, а также когда Продавец воспользовался правом, предусмотренным пунктом 3.2.6. настоящего Договора. Оплата производится Покупателем не позднее 10 числа каждого месяца путем перечисления денежных средств на расчетный счет Продавца или внесения наличных денежных средств в кассу Продавца, вне зависимости от состояния Квартиры.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">3.3.7. С момента оформления права собственности на квартиру (основной договор), Покупатель обязуется совместно с другими собственниками квартир объекта в течение 20 (двадцати) календарных дней обеспечить создание и регистрацию ТСЖ в установленном законом порядке, вне зависимости от его непосредственного членства в ТСЖ.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">3.3.8. В течение 14 (четырнадцати) календарных дней со дня официальной регистрации ТСЖ Покупатель совместно с другими собственниками квартир в многоэтажном жилом доме обязуется пройти инструктаж и заключить индивидуальный договор с ОсОО &laquo;Газпром Кыргызстан&raquo;.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Если в течение 3-х месяцев Покупатель совместно с другими собственниками квартир в многоэтажном доме не проходит инструктаж, то Покупатель оплачивает причитающуюся ему долю в стоимости повторного инструктажа, тестирования газопровода и иных платежей, определяемых ОсОО &laquo;Газпром Кыргызстан&raquo;.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">3.3.9. Покупатель обязуется выплачивать стоимость услуг по содержанию объекта и иные услуги по тарифам уполномоченных государственных органов и коммерческих организаций, оказывающих коммунальные услуги.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">3.3.10. Досрочно погасить всю имеющуюся задолженность по приобретаемой квартире, в порядке и на условиях, предусмотренных п. 3.2.4. Договора.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">3.3.11. До заключения основного договора купли-продажи заключить соответствующий договор с Управляющей организацией, осуществляющей управление и обслуживание Объекта. При этом вне зависимости от фактического оформления права собственности квартиры на Покупателя в ГУ &ldquo;Кадастр&rdquo;, Покупатель не освобождается от ответственности по оплате коммунальных услуг, дополнительных услуг и/или услуг Управляющей организации согласно выставляемым счетам от последней.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">3.3.12. Оплатить Продавцу компенсацию, если общая продаваемая площадь квартиры превышает допустимую норму отклонения от площади Квартиры, установленную пунктом 1.3. настоящего Договора, и составляет более &ndash; 2 (двух) кв.м., исходя из цены за 1 кв.м. указанной п. 2.1.2. настоящего Договора.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;"><strong>3.4. Покупатель по настоящему Договору имеет право:</strong></p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">3.4.1. Требовать от Продавца исполнения обязательств, предусмотренных настоящим Договором.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">3.4.2. При условии типовой планировки, требовать от Продавца компенсацию, если общая продаваемая площадь квартиры окажется меньше установленной настоящим Договором на более чем 2 (два)кв.м., исходя из цены за 1 кв.м. указанной в п. 2.1.2. настоящего Договора и на условиях, предусмотренных Договором, при условии сохранения типовой планировки квартиры. Компенсация разницы осуществляется в отношении только того количества квадратных метров, которая превышает установленный пунктом 1.3. настоящего Договора порог допустимых отступлений по площади Квартиры.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">3.4.3. В одностороннем порядке расторгнуть настоящий Договор при наличии оснований, предусмотренных Договором.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">3.4.4. Уступить с согласия Продавца права по настоящему Договору в пользу третьего лица, только в случае, если Покупателем оплачено полная стоимость квартиры.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">&nbsp;</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:center;"><strong>4. ОТВЕТСТВЕННОСТЬ СТОРОН</strong></p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:center;"><strong>&nbsp;</strong></p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">4.1.&nbsp; Стороны несут ответственность за неисполнение или ненадлежащее исполнение принятых на себя обязательств в соответствии с условиями настоящего Договора и требованиями законодательства Кыргызской Республики.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">4.2. В случае досрочного расторжения настоящего Договора Покупателем при отсутствии вины Продавца, а также Продавцом при неисполнении или ненадлежащем исполнении Покупателем своих обязательств и условий настоящего Договора, Продавец обязуется осуществить возврат оплаченных Покупателем денежных средств. При этом такой возврат денежных средств Покупателю производится только после реализации указанной Квартиры Продавцом третьим лицам.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">4.3. Продавец вправе начислить штраф Покупателю за несвоевременное выполнение Покупателем обязательства по регистрации основного договора купли-продажи квартиры в ГУ &laquo;Кадастр&raquo; в срок, указанный п. 1.2. Договора, в размере 5`000 (пять тысячи) сом.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">4.4. Продавец не несет ответственности за возможные веерные отключения электроэнергии на объекте, независящие от Продавца, которые могут повлиять на работоспособность электроприборов и/или иного оборудования Покупателя, и/или наступление форс-мажорных обстоятельств, связанных с временными перебоями/отключениями электроэнергии.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">4.5. Риск случайной гибели или случайной порчи/повреждения квартиры после ее передачи Продавцом по акту в соответствии с условиями настоящего Договора, несет Покупатель, включая ответственность за действия/бездействия в отношении сохранности мест общего пользования на объекте<span style="color:#00b0f0;">.</span></p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">4.6. Продавец не несет ответственности за любые претензии уполномоченных государственных органов и/или иных третьих лиц относительно содержания и охраны квартиры с момента передачи квартиры Покупателю в порядке, предусмотренном Договором, включая противоправные действия Покупателя или третьих лиц, допущенных Покупателем, нарушающие законодательство Кыргызской Республики.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">4.7. Покупатель после принятия квартиры по акту приема передачи самостоятельно несет ответственность за санитарно-техническое состояние квартиры, сохранность внутренних конструкций, инженерных коммуникаций, расположенных в квартире, включая соблюдение пожарной безопасности.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">4.8.В случае самостоятельного и несанкционированного ремонта и/или переоборудования Покупателем инженерных сетей, систем отопления, холодного/горячего водоснабжения, электропроводки, установленных в квартире, Покупатель самостоятельно несет ответственность за любые последствия, возникшие после таких действий Покупателя и/или его привлеченных третьих лиц и Покупатель не вправе предъявлять каких-либо претензий имущественного/неимущественного характера к Продавцу в случае наступления таких последствий.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">&nbsp;</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:center;"><strong>5. ФОРС-МАЖОР</strong></p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:center;"><strong>&nbsp;</strong></p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">5.1. Стороны освобождаются от ответственности за частичное или полное неисполнение обязательств по настоящему Договору, если это неисполнение явилось следствием обстоятельств непреодолимой силы (форс-мажорных обстоятельств), возникших после заключения настоящего Договора, то есть в результате действия обстоятельств чрезвычайного характера, которые Стороны не могли предвидеть и предотвратить разумными мерами.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; К таким обстоятельствам чрезвычайного характера относятся: наводнения, пожар, землетрясения и иные стихийные бедствия, гражданская война, народные волнения, массовые беспорядки, военные действия на территории Кыргызской Республики, издание органом государственной власти или местного самоуправления нормативного (ненормативного) правового акта, препятствующему выполнение Сторонами своих обязательств по настоящему Договору.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">5.2. При наступлении обстоятельств, указанных в п. 5.1 Договора, Сторона по настоящему Договору, для которой создалась невозможность исполнения ее обязательств по Договору, должна в кратчайший срок известить о них в письменном виде другую Сторону и принять все необходимые меры для надлежащего исполнения своих обязательств по Договору после прекращения действия форс-мажорных обстоятельств.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">5.3. При наступлении обстоятельств экономического спада, таких как: стагнация, рецессия и т.д., Стороны соразмерно продолжительности таких обстоятельств увеличивают (пересматривают) сроки строительства, о чем будет заключено дополнительное соглашение к настоящему Договору.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Под экономическим спадом, рецессией по смыслу настоящего подпункта понимается такая ситуация на рынке недвижимости Кыргызской Республики длящаяся более 3-х месяцев, когда объемы продаж жилых и нежилых помещений на первичном рынке недвижимости падают/сокращаются (более чем 50 %) от предыдущих объемов продаж при условии, что продажная цена в предыдущем и текущем периоде остается неизменной.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">5.4. Стороны настоящим Договором определили, что при наличии форс-мажорных обстоятельств, сроки исполнения Сторонами обязательств передвигается на срок, соразмерный сроку действия форс-мажорных обстоятельств.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">&nbsp;</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:center;"><strong>&nbsp;</strong></p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:center;"><strong>6. ОСОБЫЕ УСЛОВИЯ</strong></p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:center;"><strong>&nbsp;</strong></p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">6.1. Оплата производится только по рыночному курсу (Кыргызской Республики).</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:center;"><strong>&nbsp;</strong></p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:center;"><strong>7. СРОК ДЕЙСТВИЯ И УСЛОВИЯ РАСТОРЖЕНИЯ ДОГОВОРА</strong></p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:center;"><strong>&nbsp;</strong></p>
    <p style="font-size: 12pt; margin-top:6pt; margin-bottom:0pt; text-align:justify;">7.1. Настоящий Договор вступает в силу с момента подписания Сторонами, и действует до момента полного исполнения Сторонами обязательств по нему.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">7.2. Настоящий Договор, может быть, расторгнут по взаимному письменному согласию Сторон, а также в случаях, предусмотренных настоящим Договором и законодательством Кыргызской Республики.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">7.3. Настоящий Договор, может быть, расторгнут одной из Сторон в одностороннем порядке в случае, если будет иметь место существенное нарушение условий Договора.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">7.4. Стороны определили следующие существенные нарушения условий Договора, при котором Стороны могут в одностороннем порядке расторгнуть настоящий Договор.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;"><strong>Продавец</strong> вправе расторгнуть настоящий Договор в одностороннем порядке без обращения в суд, если:</p>
    <ol type="1" style="margin:0pt; padding-left:0pt;">
        <li style="margin-left:32pt; text-align:justify; line-height:108%; padding-left:4pt;">Покупатель более 2-х раз не исполнит свои обязательства по внесению денежных средств согласно графикаплатежей (Приложение №1) в счет оплаты стоимости приобретаемой квартиры.</li>
    </ol>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; В данном случае Продавец вправе в одностороннем порядке и без обращения в суд расторгнуть настоящий Договор, с соблюдением условия, указанного п.7.6. настоящего Договора и Договор считается расторгнутым по истечении 7 (семи) календарных дней с момента направления Покупателю Продавцом уведомления. Надлежащим уведомлением об одностороннем расторжении Договора со стороны Продавца считается отправленное в адрес Покупателя уведомление в порядке, предусмотренном п.8.6.&nbsp; настоящего Договора.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; При этом, Продавец во внесудебном порядке вправе изъять из пользования Покупателя, принадлежащую Продавцу Квартиру на основании настоящего Договора.&nbsp; В случае расторжения настоящего Договора Продавцом в порядке, предусмотренном настоящим пунктом, либо Покупателем при отсутствии оснований, предусмотренных Договором, Продавец вправе распоряжаться Квартирой по своему усмотрению, включая право реализовать ее третьим лицам, с определением в одностороннем порядке рыночной стоимости Квартиры и обязанностью возврата Покупателю уплаченных денежных средств за Квартиру предусмотренной пунктом 4.4. настоящего Договора.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; При этом, такой возврат денежных средств Покупателю производится только после реализации Продавцом указанной квартиры третьим лицам;</p>
    <ol start="2" type="1" style="margin:0pt; padding-left:0pt;">
        <li style="margin-left:32pt; text-align:justify; padding-left:4pt;">Покупатель после приема квартиры без письменного согласия Продавца разрушит,</li>
    </ol>
    <p style="font-size: 12pt; margin-top:0pt; margin-left:18pt; margin-bottom:0pt; text-align:justify;">изменит в квартире перегородки, несущие конструкции, внутренние инженерные сети, или не обеспечит беспрепятственный доступ Продавца в квартиру, в случае необходимости.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong><strong>Покупатель</strong> вправе расторгнуть настоящий Договор в одностороннем порядке, если:</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">1) Продавец не исполнит свои обязательства по передаче квартиры под &laquo;чистовую отделку&raquo; (т.е. подготовка к чистовой отделке) в сроки, предусмотренные подпунктами 3.1.1 и 3.3.2 пункта 3.1 настоящего Договора;</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">2) Продавец не оборудует квартиру согласно перечню, прилагаемого к настоящему Договору (Приложение №2), и не устранит нарушение после письменного обращения Покупателя в сроки, согласованные Сторонами.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">7.5. В случае расторжения Договора, Покупатель не имеет права требовать от Продавца материальной компенсации за произведенное за свой счет неотделимое улучшение в квартире по Договору, а также обязуется самостоятельно освободить занимаемую квартиру по Договору, включая обеспечение освобождения проживающих с Покупателем третьих лиц, с принадлежащим ему (им) имуществом, не позднее 7 (Семи) календарных дней с момента получения соответствующего уведомления от Продавца.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; В случае невыполнения данного условия Договора, Продавец не несет ответственности за сохранность имущества Покупателя, оставленных в квартире по Договору.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">7.6. В случае досрочного расторжения Договора, Продавец обязуется возвратить Покупателю денежные средства за приобретаемую квартиру по Договору, с учетом уплаченных денежных средств в период действия акции и на ее условиях, предусмотренных Договором (в случае ее проведения) и в порядке, предусмотренном условиями Договора.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">&nbsp;</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-right:2pt; margin-bottom:0pt; text-align:center;"><strong>8. ЗАКЛЮЧИТЕЛЬНЫЕ ПОЛОЖЕНИЯ</strong></p>
    <p style="font-size: 12pt; margin-top:0pt; margin-right:2pt; margin-bottom:0pt; text-align:center;"><strong>&nbsp;</strong></p>
    <p style="font-size: 12pt; margin-top:3pt; margin-bottom:0pt; text-align:justify;">8.1. Любые изменения и дополнения к настоящему Договору имеют силу в том случае, если они оформлены в письменном виде и подписаны обеими Сторонами.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">8.2. Стороны настоящим Договором определили, что все отношения между Сторонами носят сугубо конфиденциальный характер, в связи, с чем каждая из Сторон обязуется не передавать и не разглашать третьим лицам информацию, касающуюся настоящего Договора, кроме случаев, оговоренных действующим законодательством Кыргызской Республики.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-right:2.15pt; margin-bottom:0pt; text-align:justify;">8.3. Все споры или разногласия, возникающие между Сторонами по настоящему Договору или в связи с ним, разрешается путем переговоров между Сторонами. В случае невозможности разрешения разногласий путем переговоров любые споры, возникающие и/или связанные с настоящим Договором, подлежат разрешению в суде в порядке, установленном законодательством Кыргызской Республики.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">8.4. В случае массовой неоплаты 40 % покупателей квартир и/или более своих задолженностей по приобретению квартир Продавцу, Продавец не несет ответственности за своевременное завершение строительства Объекта по срокам, установленным в Договоре.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-right:2pt; margin-bottom:0pt; text-align:justify;">8.5. Стороны определили, что в случае, если одна из Сторон в последующем будет уклоняться от заключения основного договора купли-продажи квартиры, другая Сторона вправе обязать эту Сторону заключить основной договор в порядке, предусмотренном пунктом 4 статьи 406 Гражданского кодекса Кыргызской Республики.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">8.6. Все письма, сообщения, уведомления и иные документы, отправленные Продавцом на адреса, указанные в Договоре, в настоящем Соглашении и/или по последним известным контактам Покупателя посредством телефонограммы, электронного сообщения, WhatsApp сообщения или SMS сообщения считаются юридически доставленными Покупателю и имеют силу письменного уведомления.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-right:2pt; margin-bottom:0pt; text-align:justify;">8.7. Настоящий Договор составлен в 2 (двух) экземплярах на русском языке, имеющих одинаковую юридическую силу, по одному экземпляру для каждой из Сторон. Обязательства по регистрации настоящего Договора в компетентных органах Кыргызской Республики возлагаются на Покупателя.</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">&nbsp;</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-bottom:0pt; text-align:justify;">&nbsp;</p>
    <p style="font-size: 12pt; margin-top:0pt; margin-right:2pt; margin-bottom:0pt; text-align:center;"><strong>9. АДРЕСА И ПОДПИСИ СТОРОН</strong></p>
    <table cellspacing="0" cellpadding="0" style="width:478pt; border-collapse:collapse;">
        <tbody>
            <tr>
                <td style="padding-right:5.4pt; padding-left:5.4pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:8pt; font-size:12pt;"><strong>&nbsp;</strong></p>
                    <p style="margin-top:0pt; margin-bottom:8pt; font-size:12pt;"><strong>&nbsp;</strong></p>
                    <p style="margin-top:0pt; margin-bottom:8pt; font-size:12pt;"><strong>&laquo;ПРОДАВЕЦ&raquo;:</strong></p>
                    <p style="margin-top:0pt; margin-bottom:0pt;font-size:12pt;"><strong>&laquo;</strong><strong><span style="color:#0f243e;"><?php echo e($data['company_director']); ?></span></strong><strong>&raquo;</strong></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">Кыргызская Республика,</p>
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">
                        <span style="color:#0f243e;"><?php echo e($data['company_address']); ?></span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">ИНН <span style="color:#0f243e;"><?php echo e($data['company_inn']); ?></span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">ОКПО 22865098</p>
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">
                        ЗАО &laquo;<?php echo e($data['company_bank']); ?>&raquo;&nbsp;&nbsp;</p>
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">
                        <?php echo e($data['company_address']); ?>

                    </p>
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">БИК 118002</p>
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">Тел.<?php echo e($data['company_phone']); ?>, факс 5-65-65</p>
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">Наименование получателя: ОсОО&laquo;Бизнес</p>
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">Хаус КГ&raquo;</p>
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">Р\с KGS №<span style="color:#0f243e;"><?php echo e($data['company_settlement']); ?></span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><strong>Генеральный</strong><strong>&nbsp;&nbsp;&nbsp;</strong><strong>директор&nbsp;</strong></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;"><span style="">Г</span><span style="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">М.П. __________ _______/<?php echo e($data['company_director']); ?>.</p>
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">(подпись)</p>
                    <p style="margin-top:0pt; margin-right:2pt; margin-bottom:8pt; text-align:center; font-size:12pt;"><strong>&nbsp;</strong></p>
                    <p style="margin-top:0pt; margin-right:2pt; margin-bottom:8pt; text-align:center; font-size:12pt;"><strong>&nbsp;</strong></p>
                </td>
                <td style="padding-right:5.4pt; padding-left:5.4pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-right:2pt; margin-bottom:8pt; font-size:12pt;"><strong>&nbsp;</strong></p>
                    <p style="margin-top:0pt; margin-right:2pt; margin-bottom:8pt; font-size:12pt;"><strong>&nbsp;</strong></p>
                    <p style="margin-top:0pt; margin-right:2pt; margin-bottom:8pt; font-size:12pt;"><strong>&laquo;ПОКУПАТЕЛЬ&raquo;:</strong><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></p>
                    <p style="margin-top:0pt; margin-right:2pt; margin-bottom:8pt; font-size:12pt;"><strong></strong><?php echo e($data['last_name']); ?> <?php echo e($data['first_name']); ?> <?php echo e($data['middle_name']); ?><strong></strong></p>
                    <p style="margin-top:0pt; margin-right:2pt; margin-bottom:8pt; font-size:12pt;"><?php echo e(date('d.m.Y', strtotime($data['birth_date']))); ?>года рождения, Паспорт</p>
                    <p style="margin-top:0pt; margin-right:2pt; margin-bottom:8pt; font-size:12pt;"><strong><?php echo e($data['series_number']); ?></strong>от <strong><?php echo e(date('d.m.Y', strtotime($data['given_date']))); ?>года</strong>&nbsp;</p>
                    <p style="margin-top:0pt; margin-right:2pt; margin-bottom:8pt; font-size:12pt;"><strong>МКК 50-40 ИНН <?php echo e($data['company_inn']); ?></strong></p>
                    <p style="margin-top:0pt; margin-right:2pt; margin-bottom:8pt; font-size:12pt;">проживающий по адресу: Кыргызская Республика.</p>
                    <p style="margin-top:0pt; margin-right:2pt; margin-bottom:8pt; font-size:12pt;">__________________________________________</p>
                    <p style="margin-top:0pt; margin-right:2pt; margin-bottom:8pt; font-size:12pt;">Контакты: <strong><?php echo e($data['phone_number']); ?></strong></p>
                    <p style="margin-top:0pt; margin-right:2pt; margin-bottom:8pt; font-size:12pt;">E-mail:_________________<span style="">&nbsp;&nbsp;</span></p>
                    <p style="margin-top:0pt; margin-right:2pt; margin-bottom:8pt; font-size:12pt;"><strong></strong><?php echo e($data['last_name']); ?> <?php echo e($data['first_name']); ?> <?php echo e($data['middle_name']); ?><strong>&nbsp;</strong></p>
                    <p style="margin-top:0pt; margin-right:2pt; margin-bottom:8pt; font-size:12pt;"><strong>____________/____________________</strong></p>
                    <p style="margin-top:0pt; margin-right:2pt; margin-bottom:8pt; font-size:12pt;"><em>(</em><strong>подпись</strong><em>) (</em>Ф.И.О.)</p>
                    <p style="margin-top:0pt; margin-right:2pt; margin-bottom:8pt; text-align:center; font-size:12pt;"><strong>&nbsp;</strong></p>
                </td>
            </tr>
        </tbody>
    </table>
</div>


<?php if($discount): ?>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
            <table width="100%" cellspacing="0" cellpadding="0" style="border:0.75pt solid #000000; border-collapse:collapse;">
                <tbody>
                    <tr style="height:12.2pt;">
                        <td colspan="2" style="width:286.9pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:115%; font-size:10.5pt;"><strong><span style="font-family:'Times New Roman';">Шартноманинг умумий суммаси:</span></strong></p>
                        </td>
                        <td style="width:152.25pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:115%; font-size:10.5pt;"><strong><span style="font-family:'Times New Roman';">
                                <?php
                                    echo number_format($data['price_sell']-(($data['price_sell']/100) * $discount));  
                                ?>
                                сум
                            </span></strong></p>
                        </td>
                    </tr>
                    <tr style="height:28.55pt;">
                        <td colspan="2" style="width:286.9pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:115%; font-size:10.5pt;"><strong><span style="line-height:115%; font-family:'Times New Roman'; font-size:9pt;"><?php echo e((($discount) ? $discount: 0)); ?>% олдиндан тўлов сўммаси</span></strong><strong><span style="font-family:'Times New Roman';">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></strong></p>
                        </td>
                        <td style="width:152.25pt; border-top-style:solid; border-top-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:115%; font-size:10.5pt;"><strong><span style="font-family:'Times New Roman';">
                                <?php
                                    echo number_format($data['price_sell']-(($data['price_sell']/100) * $discount));  
                                ?>
                            </span></strong><strong><span style="font-family:'Times New Roman';">&nbsp;&nbsp;</span></strong><strong><span style="font-family:'Times New Roman';">сум</span></strong></p>
                        </td>
                    </tr>

                    <tr style="height:28.55pt;">
                        <td colspan="2" style="width:286.9pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:115%; font-size:10.5pt;"><strong><span style="line-height:115%; font-family:'Times New Roman'; font-size:9pt;">
                                Шу жумладан тақдим этилган 

                                <?php echo e($discount); ?>

                                % чегирманинг хисобланган суммаси:
                            </span></strong><strong><span style="font-family:'Times New Roman';">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></strong></p>
                        </td>
                        <td style="width:152.25pt; border-top-style:solid; border-top-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                            <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:115%; font-size:10.5pt;"><strong><span style="font-family:'Times New Roman';">
                                <?php echo e(number_format(($data['price_sell']/100) * $discount)); ?>

                            </span></strong><strong><span style="font-family:'Times New Roman';">&nbsp;&nbsp;</span></strong><strong><span style="font-family:'Times New Roman';"> сум</span></strong></p>
                        </td>
                    </tr>
                </tbody>
            </table>
        <?php endif; ?>


        <?php if(!empty($has_pay_status) && count($has_pay_status) > 0): ?>
            
            <div style="clear:both;margin-top: 100%;"></div>
            <div style="width: 38%;margin-left: auto;">
                Приложение № <?php echo e($data['contract_number']); ?> <br>
                к предварительному договору <br>
                купли-продажи квартиры №<?php echo e($data['number_of_flat']); ?> <br>

                <?php $start_date = ''; 
                $start_date = date('d',strtotime($has_pay_status[0]['must_pay_date']));
                
                    switch (date('m', strtotime($has_pay_status[0]['must_pay_date']))) {
                        case '01':
                            $start_date .= ' Январь '; 
                        break;
                        case '02':
                            $start_date .= ' Февраль '; 
                        break;
                        case '03':
                            $start_date .= ' Март '; 
                        break;
                        case '04':
                            $start_date .= ' Апрель '; 
                        break;
                        case '05':
                            $start_date .= ' Май '; 
                        break;
                        case '06':
                            $start_date .= ' Июнь '; 
                        break;
                        case '07':
                            $start_date .= ' Июль '; 
                        break;
                        case '08':
                            $start_date .= ' Aвгуст '; 
                        break;
                        case '09':
                            $start_date .= ' Сентябрь '; 
                        break;
                        case '10':
                            $start_date .= ' Октябрь '; 
                        break;
                        case '11':
                            $start_date .= ' Ноябрь '; 
                        break;
                        case '12':
                            $start_date .= ' Декабрь '; 
                        break;
                        
                    }
                    $start_date .= date('Y',strtotime($has_pay_status[0]['must_pay_date']));
                ?>
                от <?php echo e($start_date); ?> г.
            </div>
            <br>
            <br>
            <br>

            <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:normal; font-size:12pt;"><strong><span style="font-family:'Times New Roman';">
                ГРАФИК<br>
                внесения денежных средств в счет <br>
                оплаты стоимости квартиры
            </span></strong></p>
            <br>
            <table border="1" width="100%" cellspacing="0" cellpadding="0" style="border:0.75pt solid #000000; border-collapse:collapse;">
                <tbody>
                    <tr>
                        <th style="border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding: 5px; vertical-align:middle;text-align: center;font-size: 12pt;">№ п/п</th>
                        <th style="border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding: 5px; vertical-align:middle;text-align: center;font-size: 12pt;">Дата внесения денежных средств</th>
                        <th style="border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding: 5px; vertical-align:middle;text-align: center;font-size: 12pt;">Сумма денежных средств, подлежащая внесению 
                            <?php if($currency): ?>
                                (долл. США)
                            <?php else: ?>
                                (сом)
                            <?php endif; ?>
                        </th>
                        <th style="border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding: 5px; vertical-align:middle;text-align: center;font-size: 12pt;">Оплачено</th>
                    </tr>
                    <tr>
                        <td style="border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding: 5px; vertical-align:middle;text-align: center;font-size: 12pt;"></td>
                        <td style="border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding: 5px; vertical-align:middle;text-align: center;font-size: 12pt;">Взнос <?php echo e($start_date); ?></td>
                        <td style="border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding: 5px; vertical-align:middle;text-align: center;font-size: 12pt;"><?php echo e(number_format($data['price_sell']-$data['initial_fee'],0,'',' ')); ?> 
                            <?php echo e((($currency) ? ' $' : '')); ?>

                        </td>
                        <td style="border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding: 5px; vertical-align:middle;text-align: center;font-size: 12pt;"></td>
                    </tr>



                    <?php $i = 1; ?> <?php $__currentLoopData = $has_pay_status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td style="border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding: 5px; vertical-align:middle;text-align: center;font-size: 12pt;">
                                <span style="font-family:'Times New Roman';"><?php echo e($i); ?></span>
                            </td>
                            <td style="border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding: 5px; vertical-align:middle;text-align: center;font-size: 12pt;">
                                <span style="font-family:'Times New Roman';">
                                    <?php echo e(date('d.m.Y', strtotime($value->must_pay_date))); ?>

                                </span>
                            </td>
                            <td style="border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding: 5px; vertical-align:middle;text-align: center;font-size: 12pt;">
                                <span style="font-family:'Times New Roman';">
                                    <?php
                                        if ($currency) {
                                            echo number_format(round($value->price/$currency->SUM,2),0,'',' ').' $';
                                        }
                                        else{
                                            echo number_format($value->price,0,'',' ');   
                                        }
                                    ?>   
                                </span>
                            </td>
                            <td style="border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding: 5px; vertical-align:middle;text-align: center;font-size: 12pt;"></td>
                        </tr>
                    <?php $i++; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <br>
            <br>
            <table cellspacing="0" cellpadding="0" style="width:467.2pt; border-collapse:collapse;">
            <tbody>
                <tr>
                    <td style="padding-right:5.4pt; padding-left:5.4pt; vertical-align:top;">
                        <p style="margin-top:0pt; margin-bottom:0pt; line-height:108%; font-size:12pt;"><strong><em>&laquo;ПРОДАВЕЦ&raquo;:</em></strong><strong><em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</em></strong></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; line-height:108%; font-size:12pt;">
                            <em>&laquo; <?php echo e($data['company_name']); ?> &raquo;</em>
                        </p>
                        <p style="margin-top:0pt; margin-bottom:0pt; line-height:108%; font-size:12pt;"><em>&nbsp;</em><em>Генеральный директор М.П</em></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; line-height:108%; font-size:12pt;"><em>/___________ / 
                            <?php echo e($data['company_director']); ?>

                        </em><em><span style="color:#0f243e;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></em></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; line-height:108%; font-size:12pt;"><em><span style="color:#0f243e;">(Подпись)</span></em><em><span style="color:#0f243e;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></em><em><span style="color:#0f243e;">(Ф.И.О)</span></em></p>
                    </td>
                    <td style="padding-right:5.4pt; padding-left:5.4pt; vertical-align:top;">
                        <p style="margin-top:0pt; margin-bottom:0pt; line-height:108%; font-size:12pt;"><strong>&laquo;ПОКУПАТЕЛЬ&raquo;&nbsp;</strong></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; line-height:108%; font-size:12pt;"><strong>&nbsp;</strong></p>
                        <p style="margin-top:0pt; margin-right:2pt; margin-bottom:8pt; font-size:12pt;"><strong>
                            <?php echo e($data['last_name']); ?> <?php echo e($data['first_name']); ?> <?php echo e($data['middle_name']); ?>

                        &nbsp;</strong></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; line-height:108%; font-size:12pt;">/_______/ _______________________/. (Подпись)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (Ф.И.О)&nbsp;&nbsp;&nbsp;</p>
                        <p style="margin-top:0pt; margin-bottom:0pt; line-height:108%; font-size:12pt;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                    </td>
                </tr>
            </tbody>
        </table>

        <?php endif; ?>

    </div>
</div>



<div class="url_div" data-url="<?php echo e($url); ?>"></div>
<!-- </html> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"></script>
<script src="<?php echo e(asset('/backend-assets/forthebuilders/javascript/jquery-3.6.1.js')); ?>"></script>

<script>
    $(document).ready(function() {
        var divToPrint = document.getElementById('DivIdToPrint');
        var newWin = window.open('', 'Print-Window');
        newWin.document.open();
        newWin.document.write('<html><body style="width:85%; padding-left: 7.5%" onload="window.print()">' + divToPrint.innerHTML +
            '</body></html>');
        newWin.document.close();
        newWin.onafterprint = window.close;

        var url = $('.url_div').attr('data-url')
        setTimeout(function() {
            var showId = $('#showId').val();
            location.href = url;
        }, 10);
        
    })

</script>

<?php echo $__env->make('forthebuilder::layouts.forthebuilder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/user/Desktop/laravel/icstroy/Modules/ForTheBuilder/Resources/views/deal/new_print_bussiness.blade.php ENDPATH**/ ?>