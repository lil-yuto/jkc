<?php get_header(); ?>

<?php if (have_posts()): ?>
 <?php while (have_posts()): the_post(); ?>

  <main>
   <div class="p-sub-fv l-sub-fv">

    <div class="p-sub-fv__container l-container">
     <div class="p-sub-fv__title c-page-title">
      <h1 class="c-page-title__main"><?php the_title(); ?></h1>
     </div>
    </div>

   </div>

   <div class="p-sub-fv__breadcrumbs c-breadcrumbs l-breadcrumbs">
    <?php if (function_exists('bcn_display')) {
     bcn_display();
    }; ?>
   </div>

   <div class="l-container l-container--sub">

    <h3 class="c-heading c-heading--lv3">東京ブロックトリマー委員会</h3>

    <h5 class="c-heading c-heading--lv5">連絡事務所</h5>

    <p class="c-text">田中聖子<br>〒171-0032 豊島区雑司が谷２－１－８<br>電話03-3985-8735</p>

    <h4 class="c-heading c-heading--lv4">競技会</h4>


    <figure class="c-table">
     <table>
      <tbody>
       <tr>
        <td style="background-color:#EDF5EF"><strong>日時</strong></td>
        <td>2024年12月3日(火)　13時～</td>
       </tr>
       <tr>
        <td style="background-color:#EDF5EF"><strong>申込締切日</strong></td>
        <td>申し込みは締め切りました。</td>
       </tr>
       <tr>
        <td style="background-color:#EDF5EF"><strong>会場</strong></td>
        <td>エリール セミナールーム</td>
       </tr>
       <tr>
        <td style="background-color:#EDF5EF"><strong>審査委員長</strong></td>
        <td>深町政彦</td>
       </tr>
      </tbody>
     </table>
    </figure>


   </div>
  </main>

 <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
