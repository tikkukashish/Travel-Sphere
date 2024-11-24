<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Forgot Password</title>
    <style>
        :root{
            --first-color:#ab66ff;
            --second-color:#831eff;
            --third-color:#686769;
            --third-color-dark:#4e4a4a;
        }

        body{
            background: #353434;
            padding: 0;
        }

        h1{
            margin:0;
        }

        .form_forogot{
            display: grid;
            grid-template-columns: 100%;
            height: 100vh;
            margin-left: 1.5rem;
            margin-right: 1.5rem;
            
        }

        .title{
            font-size: 1.3rem;
            margin-bottom: 1rem;
            color:var(--second-color);
        }

        *,::before,::after{
            box-sizing: border-box;
        }

        .forget{
            position: absolute;
            bottom: 100px;
            left:450px;
            width: 100%;
            background-color: var(--third-color-dark);
            padding: 2rem 1rem;
            border-radius: 1rem;
            text-align: center;
            box-shadow: 0 8px 20px rgba(35,0,77,.2);
            animation-duration: .4s;
            animation-name: animate-form_forget;
        }

        .input_box{
            display: -moz-inline-grid;
            grid-template-columns: max-content 1fr;
            column-gap: .5rem;
            padding: 1.125rem 1rem;
            background-color: #FFF;
            margin-top: 1rem;
            border-radius: .5rem;
        }

        .login__icon{
            font-size: 1.5rem;
            color: var(--first-color)
        }

        .input_detail{
            border: none;
            outline: none;
            font-size: 0.938rem;
            font-weight: 700;
            color: var(--second-color);
        }

        .input_detail::placeholder{
            font-size: 0.938rem;
            font-family: 'Open Sans', sans-serif;
            color: var(--third-color);
        }

        .login__button{
            display: block;
            padding: 1rem;
            margin: 2rem 0;
            background-color: var(--first-color);
            color: #FFF;
            font-weight: 600;
            text-align: center;
            border-radius: .5rem;
            transition: .3s;
        }

        .login__button:hover{
        background-color: var(--second-color);
        }

        .content{
            grid-template-columns: repeat(2, max-content);
            justify-content: center;
            align-items: center;
            margin-left: 10rem;
        }

        @media screen and (min-width: 576px){
            .forget{
                width: 348px;
                justify-self: center;
            }
        }

        @keyframes animate-form_forget{
            0%{
                transform: scale(1,1);
            }
            50%{
                transform: scale(1.1,1.1);
            }
            100%{
                transform: scale(1,1);
            }
  }
    </style>
</head>
<body>
    <div class="form_forgot">
        <div class="comtent">
        
        <form action="" class="forget" id="">
            <h1 class="title">Forgot Password</h1>
        <div class="input_box">
            <i class='bx bxs-envelope login__icon' ></i>
            <input type="text" placeholder="email" class="input_detail">
        </div>
        <div class="input_box">
            <i class='bx bxs-lock login__icon'></i>
            <input type="input" placeholder=" new password" class="input_detail">
        </div>
        <a href="#" class="login__button">Change Password</a>
    </form>
    </div>
    </div>
</body>
</html>