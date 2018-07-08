@extends('front/layout/front')

@section('content')
    <section class="technology-sliders">
        <article class="technology-article container-pages">
            <div class="technology-article-body content-wrapper">
                <div class="technology-article-info-content">
                    <h2>Ткань</h2>
                    <p> At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est</p>
                </div>
                <div class="technology-article-slider-content">
                    <div id="technology-article-slider" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('images/content/technology/technology_img1_742_393.jpg') }}" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('images/content/technology/technology_img2_742_393.jpg') }}" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('images/content/technology/technology_img3_742_393.jpg') }}" alt="Third slide">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('images/content/technology/technology_img4_742_393.jpg') }}" alt="Fourths slide">
                            </div>
                        </div>
                        <div class="slider-controls-holder">
                            <a class="carousel-control-prev icomoon-to-left" href="#technology-article-slider" role="button" data-slide="prev">

                            </a>
                            <ol class="carousel-indicators">
                                <li data-target="#technology-article-slider" data-slide-to="0" class="active"></li>
                                <li data-target="#technology-article-slider" data-slide-to="1"></li>
                                <li data-target="#technology-article-slider" data-slide-to="2"></li>
                                <li data-target="#technology-article-slider" data-slide-to="3"></li>
                            </ol>
                            <a class="carousel-control-next icomoon-to-right" href="#technology-article-slider" role="button" data-slide="next">

                            </a>
                        </div>
                    </div>
                    <div class="technology-article-links">
                        <p>
                            04.02.2018
                            <a href="#">VK</a>
                            <a href="#">FB</a>
                            <a href="#">IN</a>
                        </p>
                    </div>
                </div>
            </div>
        </article>
        <div class="technology-middle-slider container-pages">
            <div id="technology-middle-slider" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item first-item active" data-name="клей">
                        <h3>клей</h3>
                        <div class="content-wrapper">
                            <div class="left-column">

                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? cabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
                            </div>
                            <div class="right-column">
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? cabo.</p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item" data-name="строчка">
                        <h3>строчка</h3>
                        <div class="content-wrapper">
                            <div class="left-column">

                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? cabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
                            </div>
                            <div class="right-column">
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? cabo.</p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item" data-name="шов">
                        <h3>шов</h3>
                        <div class="content-wrapper">
                            <div class="left-column">

                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? cabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
                            </div>
                            <div class="right-column">
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? cabo.</p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item last-item" data-name="вязь">
                        <h3>вязь</h3>
                        <div class="content-wrapper">

                            <div class="left-column">

                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? cabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
                            </div>
                            <div class="right-column">
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? cabo.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slider-controls-holder">
                    <a class="carousel-control-prev icomoon-to-left" href="#technology-middle-slider" role="button" data-slide="prev">

                    </a>
                    <div class="control-line"></div>
                    <!--  <ol class="carousel-indicators">
                        <li data-target="#technology-middle-slider" data-slide-to="0" class="active"></li>
                        <li data-target="#technology-middle-slider" data-slide-to="1"></li>
                        <li data-target="#technology-middle-slider" data-slide-to="2"></li>
                        <li data-target="#technology-middle-slider" data-slide-to="3"></li>
                    </ol> -->
                    <a class="carousel-control-next icomoon-to-right" href="#technology-middle-slider" role="button" data-slide="next">

                    </a>
                </div>
            </div>
            <div class="num">
            </div>
        </div>
    </section>
    <section class="technology-form container-pages form-camo-tek">
        <h4>Оставить свой отзыв</h4>

        <div class="content-wrapper">
            <form action="script.php" method="">
                <textarea name="msgs" placeholder="Коментарий"></textarea>
                <input type="text" name="name" placeholder="Имя">
                <input type="email" name="email" placeholder="e-mail">
                <button class="send" type="submit">Отправить</button>
            </form>
        </div>

    </section>
@endsection