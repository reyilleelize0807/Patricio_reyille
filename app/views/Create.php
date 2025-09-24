<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Record</title>
  <style>
    body {
      font-family: "Segoe UI", Arial, sans-serif;
      background: linear-gradient(135deg, #fbc2eb 0%, #a6c1ee 100%);
      margin: 0;
      padding: 20px;
      color: #333;
    }

    .container {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
    }

    .card {
      width: 100%;
      max-width: 600px;
      background: rgba(255, 255, 255, 0.9);
      backdrop-filter: blur(12px);
      border-radius: 16px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.1);
      padding: 30px 25px;
    }

    .card h1 {
      font-size: 24px;
      font-weight: 600;
      color: #2c3e50;
      margin-bottom: 20px;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 16px;
    }

    label {
      font-size: 14px;
      font-weight: 500;
      color: #555;
      margin-bottom: 6px;
      display: block;
    }

    input {
      width: 100%;
      padding: 10px 12px;
      border: 1px solid #d1d5db;
      border-radius: 8px;
      font-size: 14px;
      transition: all 0.3s ease;
    }

    input:focus {
      border-color: #3b82f6;
      outline: none;
      box-shadow: 0 0 0 3px rgba(59,130,246,0.2);
    }

    button {
      background: #3b82f6;
      color: #fff;
      font-size: 15px;
      font-weight: 500;
      padding: 10px 18px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: all 0.3s ease;
      box-shadow: 0 4px 12px rgba(59,130,246,0.3);
    }

    button:hover {
      background: #2563eb;
    }

    /* Floating Action Button */
    .fab {
      position: fixed;
      bottom: 25px;
      right: 25px;
      background: #3b82f6;
      color: #fff;
      width: 56px;
      height: 56px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 28px;
      cursor: pointer;
      box-shadow: 0 6px 15px rgba(0,0,0,0.2);
      transition: all 0.3s ease;
      text-decoration: none;
    }

    .fab:hover {
      background: #2563eb;
      transform: scale(1.05);
    }

    /* Responsive */
    @media (max-width: 480px) {
      .card {
        padding: 20px;
      }
      .card h1 {
        font-size: 20px;
      }
      input, button {
        font-size: 14px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="card">
      <h1>Create Record</h1>
      <form action="<?=site_url('/');?>" method="post">
        <div>
          <label for="last_name">Last Name</label>
          <input type="text" id="last_name" name="last_name" />
        </div>
        <div>
          <label for="first_name">First Name</label>
          <input type="text" id="first_name" name="first_name" />
        </div>
        <div>
          <label for="email">Email</label>
          <input type="email" id="email" name="email" />
        </div>
        <div style="padding-top:10px;">
          <button type="submit">Submit</button>
        </div>
      </form>
    </div>
  </div>

</body>
</html>
