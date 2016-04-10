<?php
///////////////////// TEMPLATE Prototype /////////////////////
$template_active = <<<HTML
<div class="post">
  <h1>
    <a>{title}</a> {star-rate}
  </h1>

  <span class="post-details">{date} | By: {author}</span>
  {short-story}
  
</div>
<hr />

HTML;


$template_full = <<<HTML
<div class="post">
  <h1>
    <a>{title}</a> {star-rate}
  </h1>

  <span class="post-details">{date} | By: {author}</span>
  {short-story}
  
</div>
<hr />

HTML;


$template_comment = <<<HTML

HTML;


$template_form = <<<HTML

HTML;


$template_prev_next = <<<HTML
\n
<div class="pagination">
[prev-link]<< Previous[/prev-link] {pages} [next-link]Next >>[/next-link]
</div>
\n


HTML;


$template_comments_prev_next = <<<HTML

HTML;


?>