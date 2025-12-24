<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        .phone-card {
            background: linear-gradient(135deg, #ffffff, #eff6ff);
            border-radius: 24px;
            padding: 45px 50px;
            max-width: 700px;
            margin: auto;
            box-shadow: 0 18px 40px rgba(37, 99, 235, 0.15);
            position: relative;
            overflow: hidden;
            animation: fadeUp 0.6s ease;
        }

        .phone-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            height: 6px;
            width: 100%;
            background: linear-gradient(90deg, #2563eb, #3b82f6, #60a5fa);
        }

        .phone-title {
            font-size: 2.4rem;
            font-weight: 800;
            color: #1e3a8a;
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 15px;
        }

        .phone-title i {
            background: rgba(37, 99, 235, 0.25);
            color: #2563eb;
            width: 65px;
            height: 65px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            font-size: 1.8rem;
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.25);
        }

        .support-text {
            font-size: 16.5px;
            color: #4b5563;
            line-height: 1.7;
            margin-bottom: 25px;
        }

        .phone-number {
            font-size: 2rem;
            font-weight: 800;
            color: #2563eb;
            letter-spacing: 1px;
            margin-bottom: 25px;
        }

        .call-btn {
            display: initial-flex;
            align-items: center;
            gap: 10px;
            padding: 14px 30px;
            font-weight: 700;
            border-radius: 14px;
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 12px 25px rgba(37, 99, 235, 0.25);
        }


        .call-btn:hover {
            transform: translateX(-4px);
            box-shadow: 0 18px 35px rgba(37, 99, 235, 0.45);
            color: white;
        }

        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 28px;
        }
    </style>
</head>
<body>
    
</body>
</html>