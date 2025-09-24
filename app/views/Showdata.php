<body>
  <div class="container">
    <div class="header">
      <h2>Students List</h2>
      <a class="btn btn-success" href="<?= base_url().'students/create' ?>">Add Student</a>
    </div>
    
    <!-- Search Form -->
    <form action="<?=site_url('students/get-all');?>" method="get" class="search-form">
      <?php
      $q = '';
      if(isset($_GET['q'])) {
        $q = $_GET['q'];
      }
      ?>
      <input name="q" type="text" placeholder="Search students..." value="<?=html_escape($q);?>">
      <button type="submit" class="btn btn-primary">Search</button>
    </form>
    
    <div class="card">
      <table>
        <thead>
        <tr>
          <th>ID</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
          <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php if(isset($all) && !empty($all)): ?>
          <?php foreach($all as $s): ?>
          <tr>
            <td><?=$s['id'];?></td>
            <td><?=$s['first_name'];?></td>
            <td><?=$s['last_name'];?></td>
            <td><?=$s['email'];?></td>
          <td class="actions">
              <a href="<?= base_url().'students/update/'.$s['id'] ?>" class="btn btn-warning">Edit</a>
              <a href="<?= base_url().'students/delete/'.$s['id'] ?>" class="btn btn-danger" onclick="return confirm('Delete student?')">Delete</a>
          </td>
        </tr>
        <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="5" style="text-align: center; padding: 40px; color: var(--muted);">
              No students found.
            </td>
          </tr>
        <?php endif; ?>
        </tbody>
      </table>
    </div>
    
    <!-- Pagination -->
    <?php if(isset($page) && !empty($page)): ?>
    <div class="pagination-container">
      <?= $page ?>
    </div>
    <?php endif; ?>
  </div>
</body>


