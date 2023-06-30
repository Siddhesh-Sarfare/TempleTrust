<style>
 body {
background: #555;
}

.content {
max-width: 500px;
margin: auto;
background: white;
padding: 10px;
text-align: center;

position: fixed;
top: 50%;
left: 50%;
transform: translate(-50%, -50%);
}

a:link, a:visited {
background-color: white;
color: black;
text-align: center;
text-decoration: none;
display: inline-block;
}

a:hover, a:active {
/* background-color: green; */
color: white;
}
</style>
<body>

    <div class="content" style="">
        <h1>Welcome to </h1>
        <h1>Palghar Zilla Parishad</h1>
        <a href="{{ route('splash') }}">
            <img src="{{asset('assets/frontend/images/press-here.png')}}">
        </a>
    </div>

</body>

