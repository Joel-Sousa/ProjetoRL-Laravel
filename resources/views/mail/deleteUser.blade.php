<!DOCTYPE html>
<html>

<head>
    <style>
        .container {
            /* text-align: center; */
            background-color: #EDF2F7;
            width: 50%;
            height: 50%;
        }

        .conteudo {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif,
                'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';
            font-size: 15px;
            padding: 30px;
            margin: 10px 20px 20px 20px;
            background-color: #fff;

        }
    </style>
</head>

<body>
    <div class='container'>
        <br />
        <div class='conteudo'>
            <hr />
            <div>
                Seu usuario foi deletado com sucesso: <b>{{ $data->name ?? 'Sem dados' }}.</b><br /><br />
            </div>
            <br />
            <hr />
            Tst
            <br />
        </div>
        <br />
    </div>

</body>

</html>
