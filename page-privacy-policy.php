<?php get_header(); ?>

<!-- HAMBURGER MENU -->
<div class="black-header header">
    <div class="hamburger-logo">
        <a href="<?php echo site_url(); ?>" class="hamburger-logo-black"><img src="https://www.rect-a.com/wp-content/uploads/2024/05/rect.gif" alt="rect-logo"></a>
    </div>
    <div class="hamburger-menu">
        <div class="bar"></div>
        <div class="bar"></div>
    </div>
    <div class="mobile-menu">
        <div class="mobile-menu-container">
            <div class="mobile-menu-items">
                <ul class="mobile-menu-items-left">
                    <li><a href="<?php echo site_url('/about-us'); ?>">About</a></li>
                    <li class="mobile-menu-projects">
                        <a href="<?php echo site_url('/projects'); ?>">Projects</a>
                        <ul class="project-category">
                            <li><a href="/projects?filter=all">ALL</a></li>
                            <li><a href="/projects?filter=house">HOUSE</a></li>
                            <li><a href="/projects?filter=others">OTHERS</a></li>
                        </ul>
                    </li>
                    <li class="mobile-menu-scene"><a href="<?php echo site_url('/photos'); ?>">Scene</a></li>
                </ul>
                <ul class="mobile-menu-items-right">
                    <li><a href="<?php echo site_url('/contacts'); ?>">Contact</a></li>
                    <li><a href="<?php echo site_url('/products'); ?>">Items</a></li>
                    <li><a href="<?php echo site_url('/flow'); ?>">Flow</a></li>
                </ul>
            </div>

            <div class="mobile-menu-mobile-menu-footer-container">
                <div class="mobile-menu-footer-container__left">
                    <p class="mobile-menu-footer-container__name"><a href="/">レクト一級建築士事務所</a></p>
                    <div class="mobile-menu-footer-container__company--mobile">〒151-0073<br> 東京都渋谷区笹塚1-52-6　チバビル3F</div>
                </div>

                <div class="mobile-menu-footer-container__right">
                    <div><a href="/about-us/#access">&gt;　GOOGLE MAP</a></div>
                    <!-- <div class="mobile-menu-footer-container__sns">
                        <i class="fa fa-instagram" aria-hidden="true"><a href="#"></a></i>
                        <p>instagram</p>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- HAMBURGER MENU -->

<div class="wrapper">
    <!-- <div class="single-project-header-img">
        <div class="single-project-logo-over-main-pic">
            <div class="single-project-logo-over-main-pic__left">
                <a href="<?php echo site_url(); ?>" class="pc-logo"><img src="https://www.rect-a.com/wp-content/uploads/2024/05/rect.gif" alt="rect-logo"></a>
            </div>
            <nav>
                <ul class="single-project-logo-over-main-pic__right nav-menu">
                    <li>
                        <a href="<?php echo site_url('/about-us'); ?>"><span>About</span><span>レクトについて</span></a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('/projects'); ?>"><span>Projects</span><span>施工事例</span></a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('/products'); ?>"><span>Items</span><span>製品</span></a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('/flow'); ?>"><span>Flow</span><span>設計までの流れ</span></a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('/contacts'); ?>"><span>Contact</span><span>お問い合わせ</span></a>
                    </li>
                </ul>
            </nav>
        </div>
    </div> -->

    <section class="privacy-policy-wrapper">
        <div class="privacy-policy-left">
            <h1 class="privacy-policy-page-title">
                <?php the_title(); ?>
            </h1>
            <h2 class="privacy-policy-title">プライバシーポリシー</h2>

            <div class="privacy-policy-message">
                <p>株式会社レクト一級建築士事務所（以下「当社」といいます。）は、
                    当社がウェブサイト（以下「本サイト」といいます。）を提供するにあたり、
                    ご利用される皆様（以下「利用者」といいます。）の個人に関する情報
                    （以下「個人情報」といいます。）を取得します。</p>
            </div>
            <div class="privacy-policy-mobile-border"></div>
        </div>

        <main class="privacy-policy-right">
            <?php the_content(); ?>
        </main>
    </section>
    <!-- <section class="privacy-policy-section">
                <h2 class="privacy-policy-title">第1条 （適用範囲）</h2>
                <p>本プライバシーポリシー（以下「本ポリシー」といいます。）は、当社が利用者から個人情報を取得、利用及び管理するときに適用されます。</p>
                <p>ただし、本サイト内のリンク先ウェブサイト、その他当社が直接管理していないウェブサイト等に登録されたお客様情報は、本ポリシーの適用範囲外とします。</p>
            </section>
            <section class="privacy-policy-section">
                <h2 class="privacy-policy-title">第2条 （取得する情報）</h2>
                <p class="paragraph-change">当社は、利用者から以下の情報を取得します。</p>
                <ol>
                    <li>氏名</li>
                    <li>住所</li>
                    <li>連絡先</li>
                </ol>
            </section>
            <section class="privacy-policy-section">
                <h2 class="privacy-policy-title">第3条 （利用目的）</h2>
                <p class="paragraph-change">当社が個人情報を収集・利用する目的は、以下のとおりです。</p>
                <ol>
                    <li>本サイトの提供・運営のため</li>
                    <li>本サイトの運営上必要な事項の通知のため</li>
                    <li>メールマガジンの送信、ダイレクトメールの送付のため</li>
                    <li>本サイトの各種問合せ、アフターサービス対応のため</li>
                    <li>本サイトその他のコンテンツの開発・改善のため</li>
                    <li>当社が実施するサービス又は企画に関する連絡のため</li>
                    <li>上記の利用目的に付随する目的</li>
                </ol>
            </section>
            <section class="privacy-policy-section">
                <h2 class="privacy-policy-title">第4条 （アクセス解析の方法）</h2>
                <p>当社は本サイトの利用状況等を調査・分析するために、Google社提供の「Google Analytics」を使用しています。</p>
                <p>Google Analyticsが使用されるページにお客様がアクセスする際、Cookieが発行され、Cookieを利用してGoogle社が</p>
                <p>データを収集、記録、分析します。当社は、Google社からそれらのデータを受け取り、お客様の本サイトの訪問状況を把握します。</p>
                <p>Google Analyticsにより収集、記録、分析されたお客様の情報には、特定の個人を識別する情報は一切含まれません。</p>
                <p>また、それらの情報は、Google社により同社のプライバシーポリシーに基づき管理されます。Google Analyticsでデータが収集、</p>
                <p class="paragraph-change">処理される仕組みについては、Googleポリシーと規約（https://policies.google.com/technologies/partner-sites?hl=ja）をご覧ください。</p>

                <p>なお、お客様はご自身のデータがGoogle Analyticsで収集されることを望まない場合、Google社の提供するGoogle Analytics オプトアウト</p>
                <p>アドオン（https://tools.google.com/dlpage/gaoptout?hl=ja）をご利用ください。</p>
            </section>
            <section class="privacy-policy-section">
                <h2 class="privacy-policy-title">第5条 （安全確保の措置）</h2>
                <p>当社は、収集した情報の漏えい、滅失又はき損の防止その他収集した情報の適切な管理のために必要な措置を講じます。</p>
                <p>当社が、安全管理のために講じた措置の概要は以下のとおりです。措置の具体的内容については、</p>
                <p class="paragraph-change">本ポリシーで定める窓口に対する利用者からの求めに応じて遅滞なく回答いたします。</p>
                <ol>
                    <li>基本方針の策定、個人情報の取扱いに係る規律の整備</li>
                    <li>個人情報の取扱責任者や報告連絡体制の整備</li>
                    <li>個人情報を取り扱う機器等にセキュリティ対策ソフトウェア等を導入</li>
                </ol>
            </section>
            <section class="privacy-policy-section">
                <h2 class="privacy-policy-title">第6条 （個人情報の第三者への提供）</h2>
                <ul class="paragraph-change">
                    <li><span>6-1</span>
                        <p class="paragraph-no-sentence-break">当社は、次に掲げる場合を除いて、あらかじめ利用者の同意を得ないで、取得した個人情報を第三者に提供することはありません。</p>
                    </li>
                    <ol class="paragraph-change">
                        <li>法令に基づく場合</li>
                        <li>人の生命、身体又は財産の保護のために必要がある場合であって、利用者の同意を得ることが困難であるとき。</li>
                        <li>公衆衛生の向上又は児童の健全な育成の推進のために特に必要がある場合であって、利用者の同意を得ることが困難であるとき。</li>
                        <li>国の機関若しくは地方公共団体又はその委託を受けた者が法令の定める事務を遂行することに対して協力する必要がある場合であって、
                            <span style="display: block; margin-left:4em;">利用者の同意を得ることにより当該事務の遂行に支障を及ぼすおそれがあるとき。</span>
                        </li>
                        <li>その他法令で第三者提供の制限の例外が認められている場合</li>
                    </ol>
                    <li class="paragraph-change"><span>6-2</span>
                        <p class="paragraph-no-sentence-break">前項の定めにかかわらず、次に掲げる場合には、当該個人情報の提供先は第三者に該当しないものとします。</p>
                    </li>
                    <ol>
                        <li>当社が利用目的の達成に必要な範囲内において個人情報の取扱いの全部又は一部を委託することに伴って当該個人情報が提供される場合</li>
                        <li>合併その他の事由による事業の承継に伴って個人情報が提供される場合</li>
                        <li>第7条に定める共同利用者に対して提供される場合</li>
                    </ol>
                </ul>
            </section>
            <section class="privacy-policy-section">
                <h2 class="privacy-policy-title">第7条 （個人情報の共同利用）</h2>
                <p class="paragraph-change">当社は、以下のとおり個人情報を共同利用します。</p>
                <ol>
                    <li>共同して利用される個人情報の項目
                        <ul>
                            <li>氏名</li>
                            <li>住所</li>
                            <li>連絡先</li>
                        </ul>
                    </li>
                    <li>共同して利用する者の範囲
                        <ul>
                            <li>森田アルミ工業株式会社</li>
                        </ul>
                    </li>
                    <li>利用する者の利用目的
                        <ul>
                            <li>本サイトの提供・運営のため</li>
                            <li>本サイトの運営上必要な事項の通知のため</li>
                            <li>メールマガジンの送信、ダイレクトメールの送付のため</li>
                            <li>本サイトの各種問合せ、アフターサービス対応のため</li>
                            <li>本サイトその他のコンテンツの開発・改善のため</li>
                            <li>当社が実施するサービス又は企画に関する連絡のため</li>
                        </ul>
                    </li>
                    <li>当該個人データの管理について責任を有する者の氏名又は名称及び住所並びにその代表者の氏名
                        <ul  class="no-margin-left">
                            <li>・氏名又は名称</li>
                            <li>森田アルミ工業株式会社</li>
                            <li>・住所</li>
                            <li>〒599-0201 大阪府阪南市尾崎町530-1</li>
                            <li>・代表者の氏名</li>
                            <li>森田　和信</li>
                        </ul>
                    </li>
                </ol>
            </section>
            <section class="privacy-policy-section">
                <h2 class="privacy-policy-title">第8条 （本プライバシーポリシーの変更）</h2>
                <p>当社は、法令改正への対応の必要性及び事業上の必要性に応じて、本ポリシーを変更する場合があります。</p>
                <p>本ポリシーの変更を行った場合には、本ウェブサイト上に掲載します。</p>
            </section>
            <section class="privacy-policy-section">
                <h2 class="privacy-policy-title">第9条 （開示、訂正等の手続）</h2>
                <p class="paragraph-change">9-1 利用者は、本条及び当社の関連規程に従って、当社に対し、個人情報保護法において認められる限度で、以下の求め又は請求を行うことができます。</p>
                <ol  class="paragraph-change" >
                    <li>個人情報の利用目的の通知の求め</li>
                    <li>個人情報又は第三者提供記録の開示の請求</li>
                    <li>個人情報の訂正、追加又は削除の請求</li>
                    <li>個人情報の利用の停止の請求</li>
                    <li>個人情報の第三者への提供の停止の請求</li>
                </ol>
                <p>9-2 前項の求め又は請求にあたっては、同項各号のうちいずれの請求か特定の上、本人確認のための書類（運転免許証、健康保険証、住民票の写し等）をご提出頂きます。</p>
            </section>
            <section class="privacy-policy-section">
                <h2 class="privacy-policy-title">第10条 （お問い合わせ）</h2>
                <p>当社の個人情報の取扱いに関するご相談や苦情等のお問い合わせについては、下記の窓口にご連絡ください。</p>
                <p>個人情報取扱事業者：株式会社レクト一級建築士事務所</p>
                <p>代表者名：森田　和信</p>
                <p>住所：〒151-0073　東京都渋谷区笹塚1-52-6 チバビル3F</p>
                <p>Eメールアドレス：？@moritaalumi.co.jp</p>
            </section>
        </main> -->


    <!-- CONTACTS -->
    <section class="contacts">
        <div class="contact-title">Contact Us</div>
        <div class="contact-subtitle">お問い合わせはこちらから</div>
        <a href="https://www.rect-a.com/contacts/" class="contact-form">
            <p class="footer-contact-form-title">Contact Form</p>
            <p class="footer-contact-form-icon">></p>
        </a>
    </section>
</div>

<!-- FOOTER -->
<?php get_footer();  ?>