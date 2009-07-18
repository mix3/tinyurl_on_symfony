<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $tiny_url->getid() ?></td>
    </tr>
    <tr>
      <th>Hash:</th>
      <td><?php echo $tiny_url->gethash() ?></td>
    </tr>
    <tr>
      <th>Url:</th>
      <td><?php echo $tiny_url->geturl() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('admin/edit?id='.$tiny_url->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('admin/index') ?>">List</a>
