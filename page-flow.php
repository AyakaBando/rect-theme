<?php get_header(); ?>

<div class="wrapper">
    <!----------------------------------------------------------- Header  ------------------------------------------------------------->
    <div class="header-img flow-header-image" style="background-image: url(<?php echo get_theme_file_uri('/images/top-image-flow.jpg') ?>);">
        <div class="logo-over-main-pic">
            <a href="<?php echo site_url(); ?>" class="pc-logo">
                <img src="https://www.rect-a.com/wp-content/uploads/2024/08/rect-white.png" alt="rect-logo">
            </a>
            <nav>
                <ul class="logo-over-main-pic__right nav-menu">
                    <li>
                        <a href="<?php echo site_url('/about-us'); ?>"><span>About</span><span>レクトについて</span></a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('/projects'); ?>"><span>Projects</span><span>これまでの仕事</span></a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('/products'); ?>"><span>Items</span><span>材料</span></a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('/flow'); ?>"><span>Flow</span><span>家づくりの流れ</span></a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('/contacts'); ?>"><span>Contact</span><span>お問い合わせ</span></a>
                    </li>
                </ul>
            </nav>
        </div>
        <h1 class="header-title about-header-title"><?php the_title(); ?></h1>
    </div>

    <!-- HAMBURGER MENU -->
    <div class="white-header header">
        <div class="hamburger-logo">
            <a href="<?php echo site_url(); ?>" class="hamburger-logo-white"><img src="https://www.rect-a.com/wp-content/uploads/2024/07/logo-mobile.png" alt="rect-logo-white"></a>
            <a href="<?php echo site_url(); ?>" class="hamburger-logo-black"><img src="https://www.rect-a.com/wp-content/uploads/2024/05/rect.gif" alt="rect-logo-black"></a>
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
    <!----------------------------------------------------------- Header  ------------------------------------------------------------->


    <h2 class="title flow-title"><?php the_title(); ?></h2>

    <h3 class="flow-title-2">建物が完成するまでの流れをご紹介します。（新築戸建て住宅の場合）</h3>

    <section class="flow-container">
        <div class="flow-left">
            <div class="flow-left-container">
                <h4 class="flow-sub-title"><span>01</span>お問い合わせ・ご相談</h4>
                <h4 class="flow-sub-title"><span>02</span>ヒアリング</h4>
                <h4 class="flow-sub-title"><span>03</span>プラン提案</h4>
                <!-- <h4 class="flow-sub-title"><span>04</span>再プラン提案・概算見積もり</h4> -->
            </div>
            <div class="flow-title-bar">ここまで無料</div>
        </div>
        <div class="flow-right">
            <div class="flow-right-container">
                <div class="flow-right-left">
                    <h4 class="flow-sub-title"><span>04</span>設計監理契約</h4>
                    <h4 class="flow-sub-title"><span>05</span>基本設計</h4>
                    <h4 class="flow-sub-title"><span>06</span>実施設計</h4>

                </div>
                <div class="flow-right-middle">
                    <h4 class="flow-sub-title"><span>07</span>本見積り</h4>
                    <h4 class="flow-sub-title"><span>08</span>工事請負契約</h4>
                    <h4 class="flow-sub-title"><span>09</span>着工　工事監理</h4>
                </div>
                <div class="flow-right-right">

                    <h4 class="flow-sub-title"><span>10</span>上棟</h4>
                    <h4 class="flow-sub-title"><span>11</span>完成</h4>
                    <h4 class="flow-sub-title"><span>12</span>お引き渡し</h4>
                </div>
            </div>
            <div class="flow-title-bar">ここから有料</div>
        </div>
    </section>

    <main class="flow-description-container">
        <div class="flow-description">
            <div class="flow-description-free">
                <div class="text-free">ここまで無料</div>
                <div class="flow-description-free-box">
                    <section class="flow-description-box">
                        <div class="flow-description-left">01</div>
                        <div class="flow-description-right">
                            <h4 class="flow-description-title">お問い合わせ・ご相談</h4>
                            <p class="flow-description-content">
                                <a href="https://www.rect-a.com/contacts/" class='flow-link'>お問い合わせフォーム</a>からお気軽にご連絡ください。直接お会いしてご計画についてのヒアリングを行いますので、ご希望の日時をいくつか
                                ご記載ください。オンラインでの打合せも可能です。
                            </p>
                        </div>
                    </section>

                    <section class="flow-description-box">
                        <div class="flow-description-left">02</div>
                        <div class="flow-description-right">
                            <h4 class="flow-description-title">ヒアリング</h4>
                            <p class="flow-description-content">
                                規模や期間、ご予算、雰囲気などイメージできている範囲で構いませんので、建築計画のご要望をお聞かせください。土地の資料があればお持ちください。
                                ご要望や考えがまとまっていなくても周辺の環境を読み解き、断片的な言葉などを整理しながら理想の空間を探っていきます。
                            </p>
                        </div>
                    </section>

                    <section class="flow-description-box">
                        <div class="flow-description-left">03</div>
                        <div class="flow-description-right">
                            <h4 class="flow-description-title">プラン提案</h4>
                            <p class="flow-description-content">
                                ご要望と敷地の資料を元に、現地調査と法的な諸条件の調査を行い、基本プランの提案書（平面図、立面図、断面図）を作成いたします。
                            </p>
                        </div>
                    </section>

                    <!-- <section class="flow-description-box">
                        <div class="flow-description-left">04</div>
                        <div class="flow-description-right">
                            <h4 class="flow-description-title">再プラン提案</h4>
                            <p class="flow-description-content">
                                修正したい点を踏まえて再度プランを練り直し、第二プランを提示いたします。
                            </p>
                        </div>
                    </section> -->
                    <div class="mobile-text-free">ここまで無料</div>

                </div>

            </div>
            <div class="flow-description-border"></div>
            <div class="flow-description-nonfree">
                <div class="text-nonfree">ここから有料</div>
                <div class="mobile-text-nonfree">ここから有料</div>
                <div class="flow-description-nonfree-box">

                    <section class="flow-description-box">
                        <div class="flow-description-left">04</div>
                        <div class="flow-description-right">
                            <h4 class="flow-description-title">設計監理契約</h4>
                            <p class="flow-description-content">
                                ご提案した設計意図や方向性、設計の進め方にご納得いただけた段階で設計監理契約を締結させていただきます。
                            </p>
                        </div>
                    </section>

                    <section class="flow-description-box">
                        <div class="flow-description-left">05</div>
                        <div class="flow-description-right">
                            <h4 class="flow-description-title">基本設計</h4>
                            <p class="flow-description-content">
                                提案書を元に模型やパース等を用いてイメージをすり合わせながら打合せを行います。素材の選定、構造・設備の検討も進めていきます。
                                基本プランを確定させて、基本設計図書を作成します。
                            </p>
                        </div>
                    </section>

                    <section class="flow-description-box">
                        <div class="flow-description-left">06</div>
                        <div class="flow-description-right">
                            <h4 class="flow-description-title">実施設計</h4>
                            <p class="flow-description-content">
                                引き続き打合せを行いながら、細かな仕様の決定や見積りと工事に必要な詳細図面を作成します。
                                確認申請や各種条例、許可申請に合わせて書類の作成、申請手続きを進めます。
                            </p>
                        </div>
                    </section>

                    <section class="flow-description-box">
                        <div class="flow-description-left">07</div>
                        <div class="flow-description-right">
                            <h4 class="flow-description-title">本見積り</h4>
                            <p class="flow-description-content">
                                実施設計図書を元に施工会社へ見積りを依頼します。条件やご要望に応じて１社指名または3 社程度の競争見積りになります。
                                提出された見積書を細かくチェックし、必要に応じて設計内容の調整を行いながら施工会社を決定します。
                                見積り調整の状況をみながら、確認申請を提出します。
                            </p>
                        </div>
                    </section>

                    <section class="flow-description-box">
                        <div class="flow-description-left">08</div>
                        <div class="flow-description-right">
                            <h4 class="flow-description-title">工事請負契約</h4>
                            <p class="flow-description-content">
                                お施主様と施工会社の間で工事請負契約を締結していただきます。 </p>
                        </div>
                    </section>

                    <section class="flow-description-box">
                        <div class="flow-description-left">09</div>
                        <div class="flow-description-right">
                            <h4 class="flow-description-title">着工　工事監理</h4>
                            <p class="flow-description-content">
                                工事が着工しましたら作成した設計図書の通り工事が行われているか工事監理を行います。施工者からの質疑対応や詳細図の作成、施工図チェック、
                                各工程(配置確認、配筋検査、躯体検査、断熱防水検査、電気検査、竣工検査)に沿って現場で検査を実施し、お施主様に報告します。
                            </p>
                        </div>
                    </section>

                    <section class="flow-description-box">
                        <div class="flow-description-left">10</div>
                        <div class="flow-description-right">
                            <h4 class="flow-description-title">上棟</h4>
                            <p class="flow-description-content">
                                建物の骨組み（柱や梁など）が完成し全体のかたちが見えてきます。お施主様にも現場に立ち会っていただき、空間の広さや窓の位置、
                                コンセントの配置など、図面通りに進んでいるか一緒に確認します。
                            </p>
                        </div>
                    </section>

                    <section class="flow-description-box">
                        <div class="flow-description-left">11</div>
                        <div class="flow-description-right">
                            <h4 class="flow-description-title">完成</h4>
                            <p class="flow-description-content">
                                検査機関による完了検査を受けた後、お施主様の立ち会いのもとキズや不具合がないか竣工検査を行います。
                                竣工検査で指摘された内容についてはお引き渡しまでに施工者による是正工事とクリーニングが行われます。 </p>
                        </div>
                    </section>

                    <section class="flow-description-box">
                        <div class="flow-description-left">12</div>
                        <div class="flow-description-right">
                            <h4 class="flow-description-title">お引き渡し</h4>
                            <p class="flow-description-content">
                                保証書や取扱説明書のご案内、確認申請の書類や鍵の受け渡しなどを行いお引き渡しとなります。
                                入居後の住み心地についてもぜひお聞かせください。
                            </p>
                        </div>
                    </section>
                </div>
            </div>

        </div>
    </main>

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

<!----------------------------------------------------------- Footer  ------------------------------------------------------------->
<?php get_footer(); ?>