<h1>Admin List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Hash</th>
      <th>Url</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($tiny_url_list as $tiny_url): ?>
    <tr>
      <td><a href="<?php echo url_for('admin/show?id='.$tiny_url->getId()) ?>"><?php echo $tiny_url->getId() ?></a></td>
      <td><?php echo $tiny_url->getHash() ?></td>
      <td><?php echo $tiny_url->getUrl() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('admin/new') ?>">New</a>
