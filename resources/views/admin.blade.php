<!doctype html>
<html lang="en">
<x-head></x-head>
<body onload="document.body.style.opacity='1'">
<x-navbar></x-navbar>
    <div class="container">
        <div class="row mx-auto">
            <div class="col">
                <form action="{{route('product.newType')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h2>Добавление категории</h2>
                    <input type="text" name="name" placeholder="Название">
                    <input type="file" name="image">
                    <button type="button" onclick="AddChar();">Добавить характеристику</button>
                    <div id="parent">

                    </div>
                    <button type="submit">Отправить</button>
                </form>
                <form action="{{route('product.newProduct')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h2>Добавление продукта</h2>
                    <input type="text" name="name" placeholder="Название">
                    <input type="text" name="description" placeholder="Описание">
                    <input type="text" name="price" placeholder="Цена"><br>
                    <input type="text" name="available" placeholder="Количество">
                    <input type="file" name="image[]" multiple><br>
                    <select name="type" id="select" onchange="onSelect();">
                        <option disabled selected value> -- выберите -- </option>
                        @foreach($types as $type)
                            <option value="{{ $type->id}}">{{ $type->name}}</option>
                        @endforeach
                    </select>
                    <div id="firstul">

                    </div><br>
                    <button type="submit">Отправить</button>
                </form>
            </div>
        </div>
    </div>
<x-footer></x-footer>
</body>
<script type="text/javascript">
    let select = document.getElementById('select');
    let php = @json($chars);
    let firstul = document.getElementById('firstul');
    let parent = document.getElementById('parent');
    let i = 0;
    function AddChar(){
        let br = document.createElement('br');
        br.setAttribute('id','br'+i);
        let input = document.createElement('input');
        input.setAttribute('placeholder','Наименование')
        input.setAttribute('name','chars['+ i + '][name]')
        input.setAttribute('id',i)
        let button = document.createElement('button');
        button.setAttribute('placeholder','Наименование')
        button.setAttribute('id','Button'+ i)
        button.setAttribute('onclick','DeleteBtn(this.id);')
        button.innerHTML = 'Удалить';
        parent.appendChild(input);
        parent.appendChild(button);
        parent.appendChild(br);
        i++;
    }
    function DeleteBtn(id){
        let button = document.getElementById(id)
        let splitId = id.split("Button");
        let input = document.getElementById(splitId[1])
        let br = document.getElementById('br'+splitId[1])
        input.remove();
        button.remove();
        br.remove();
    }
    function onSelect(){
        let ul = document.getElementById("ul");
        if(ul != null){
            ul.remove();
        }
        php.forEach((element, i) => {
            let Obj = php[i];
            let type_id = Obj["type_id"];
            let chars = Obj["chars"];
            let charsJson = JSON.parse(String(chars))
            if(type_id == select.value){
                var ul = document.createElement("ul");
                ul.setAttribute('id','ul')
                firstul.appendChild(ul);
                Object.entries(charsJson).forEach(([key, value]) => {
                    var keyA = `${key}`;
                    var valueA = `${value}`;
                    var li = document.createElement("li");
                    li.innerHTML += '<div><p>'+keyA+'</p><input name="'+keyA+'" value="'+valueA+'" placeholder="Значение"></div>';
                    ul.appendChild(li);
                });
            }
        });
    }
</script>
</html>
