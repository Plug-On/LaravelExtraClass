@if(Session::has('success'))


<div class="fixed right-4 top-4 bg-green-600 text-white px-10 py-3 rounded-lg" id="alert">
    <p class="text-xl font-bold">{{session('success')}}</p>
</div>
<script>
    $msg = document.getElementById('alert');
    setTimeout(()=> {
        $msg.style.top = '-100px';
        $msg.style.transition = '0.5s';
    },1000);
</script>

@endif
