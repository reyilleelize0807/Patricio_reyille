<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student List</title>
  <style>
    body {
      font-family: "Segoe UI", Arial, sans-serif;
      background: linear-gradient(135deg, #fbc2eb 0%, #a6c1ee 100%);
      margin: 0;
      padding: 20px;
      color: #333;
    }

    .container {
      max-width: 1100px;
      margin: auto;
      background: rgba(255, 255, 255, 0.85);
      backdrop-filter: blur(12px);
      border-radius: 16px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.1);
      padding: 20px 25px;
      overflow-x: auto;
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
      flex-wrap: wrap;
      gap: 12px;
    }

    .header h1 {
      font-size: 22px;
      margin: 0;
      color: #2c3e50;
      flex: 1;
    }

    .btn {
      display: inline-block;
      padding: 10px 18px;
      border-radius: 8px;
      text-decoration: none;
      font-weight: 500;
      font-size: 14px;
      transition: all 0.3s ease;
      white-space: nowrap;
    }

    .btn-add {
      background: #3b82f6;
      color: #fff;
      box-shadow: 0 4px 12px rgba(59,130,246,0.3);
    }

    .btn-add:hover { background: #2563eb; }

    table {
      width: 100%;
      border-collapse: collapse;
      background: #fff;
      border-radius: 12px;
      overflow: hidden;
      min-width: 600px; /* para hindi masyadong sikip */
    }

    thead {
      background: #f1f5f9;
    }

    th, td {
      padding: 12px 14px;
      text-align: left;
      font-size: 14px;
    }

    th {
      color: #555;
      font-weight: 600;
      border-bottom: 1px solid #e5e7eb;
    }

    tbody tr {
      border-bottom: 1px solid #eee;
      transition: background 0.3s;
    }

    tbody tr:hover {
      background: #f9fafb;
    }

    td.actions {
      display: flex;
      gap: 8px;
      flex-wrap: wrap;
    }

    .btn-edit {
      background: #facc15;
      color: #333;
      padding: 6px 12px;
      font-size: 13px;
      border-radius: 6px;
    }

    .btn-edit:hover { background: #eab308; }

    .btn-delete {
      background: #ef4444;
      color: #fff;
      padding: 6px 12px;
      font-size: 13px;
      border-radius: 6px;
    }

    .btn-delete:hover { background: #dc2626; }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
      body { padding: 15px; }

      .header {
        flex-direction: column;
        align-items: flex-start;
      }

      .header h1 {
        font-size: 20px;
      }

      table {
        font-size: 13px;
      }

      th, td {
        padding: 10px 12px;
      }

      td.actions {
        flex-direction: column;
        gap: 6px;
      }
    }

    @media (max-width: 480px) {
      .header h1 {
        font-size: 18px;
      }

      .btn {
        font-size: 13px;
        padding: 8px 14px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <h1>Student List</h1>
      <a href="<?=site_url('/');?>" class="btn btn-add">+ Add New Student</a>
    </div>

    <div style="overflow-x:auto;">
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Lastname</th>
            <th>Firstname</th>
            <th>Email</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach(html_escape($students) as $student): ?>
          <tr>
            <td><?=$student['id'];?></td>
            <td><?=$student['last_name'];?></td>
            <td><?=$student['first_name'];?></td>
            <td><?=$student['email'];?></td>
            <td class="actions">
              <a href="<?=site_url('user/update/'.$student['id']);?>" class="btn-edit">Update</a>
              <a href="<?=site_url('user/soft-delete/'.$student['id']);?>" class="btn-delete">Delete</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
