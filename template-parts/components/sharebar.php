<!-- START template-parts/components/sharebar.php -->

<div class="sharebar">
  <ul class="sharebar__list">
    <li>
      <a class="js--share" href="https://www.facebook.com/sharer/sharer.php?u=<?= get_permalink(); ?>">
        <span class="a11y">Share on Facebook</span>
        <?php echo file_get_contents(get_template_directory_uri() . "/dist/images/svg/facebook.svg"); ?>
      </a>
    </li>
    <li>
      <a class="js--share" href="https://www.linkedin.com/shareArticle?mini=true&url=<?= get_permalink(); ?>&title=<?= get_the_title(); ?>">
        <span class="a11y">Share on LinkedIn</span>
        <?php echo file_get_contents(get_template_directory_uri() . "/dist/images/svg/linkedin.svg"); ?>
      </a>
    </li>
    <li>
      <a href="https://twitter.com/intent/tweet?url=<?= get_permalink(); ?>" class="js--share">
        <span class="a11y">Share on Twitter</span>
        <?php echo file_get_contents(get_template_directory_uri() . "/dist/images/svg/twitter.svg"); ?>
      </a>
    </li>
    <li>
      <a href="mailto:?subject=<?= get_the_title(); ?>&body=<?= get_permalink(); ?>">
        <span class="a11y">Share on Twitter</span>
        <?php echo file_get_contents(get_template_directory_uri() . "/dist/images/svg/email.svg"); ?>
      </a>
    </li>
  </ul>
</div>

<!-- END template-parts/components/sharebar.php -->
