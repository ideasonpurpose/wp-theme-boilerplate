<!-- START template-parts/single.php -->

<main>
  <article class="wrapper article">

    <header>
      <?= the_category(); ?>
      <h1><?php get_the_title() ?></h1>
    </header>

    <section class="editorial">
      <?php the_content(); ?>
    </section>

  </article>
</main>

<!-- END template-parts/single.php -->
