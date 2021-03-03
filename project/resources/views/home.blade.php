@extends('layouts.app')

@section('content')
<div>
    <div class="main">
        <div class="preview">
            <h1>
                ДОПОЛНИТЕЛЬНОЕ ОБРАЗОВАНИЕ <br>
                с применением дистанционных технологий
            </h1>
            <img src="{{ asset("storage/images/preview.jpg") }}" alt="preview" class="w-100">
        </div>
    </div>
    <div class="container main-content">
        <h2>АНО ДПО УЧЕБНЫЙ ЦЕНТР “ПРОФЕССИОНАЛ”</h2>
        <p>Наш учебный центр предлашает услуги по обучению специалистов, руководителей и работников разных сфер деятельности</p>
        <ul>
            <li>
                <img src="{{ asset("storage/images/content-icon.svg") }}" alt="icon">
                <p>Промышленная безопасность</p>
            </li>
            <li>
                <img src="{{ asset("storage/images/content-icon.svg") }}" alt="icon">
                <p>Пожарно технический минимум</p>
            </li>
            <li>
                <img src="{{ asset("storage/images/content-icon.svg") }}" alt="icon">
                <p>Экологическая безопасность</p>
            </li>
            <li>
                <img src="{{ asset("storage/images/content-icon.svg") }}" alt="icon">
                <p>Энергетическая безопасность</p>
            </li>
            <li>
                <img src="{{ asset("storage/images/content-icon.svg") }}" alt="icon">
                <p>Элеткробезопасность</p>
            </li>
            <li>
                <img src="{{ asset("storage/images/content-icon.svg") }}" alt="icon">
                <p>Охрана труда</p>
            </li>
        </ul>
        <p>
            Предлагается очная и дистанционная формы обучения. В процессе подготовки руководителей и работников используются современные методические материалы., нормативная литература, мультимедийное оборудование. Занятия у нас позволит вам качественно подготовиться к процессу аттестации.
        </p>
        <h3>Преимущество сотрудничества с нами</h3>
        <p>Наш учебный центр  с 2011 года на рынке оказания образовательных услуг. Поэтому мы можем предложить своим клиентам следующие условия сотрудничества.</p>
        <ul>
            <li>
                <img src="{{ asset("storage/images/content-icon.svg") }}" alt="icon">
                <p>Разумные цены на все образовательные программы</p>
            </li>
            <li>
                <img src="{{ asset("storage/images/content-icon.svg") }}" alt="icon">
                <p>Филиалы по всей России</p>
            </li>
            <li>
                <img src="{{ asset("storage/images/content-icon.svg") }}" alt="icon">
                <p>Хорошо оборудованные и оснащенные всем необходимым аудитории</p>
            </li>
            <li>
                <img src="{{ asset("storage/images/content-icon.svg") }}" alt="icon">
                <p>Проведение дистанционных занятий</p>
            </li>
            <li>
                <img src="{{ asset("storage/images/content-icon.svg") }}" alt="icon">
                <p>У нас преподают опытные педагоги, являющиеся высококвалифицированными специалистами в сфере своей деяетельности.</p>
            </li>
        </ul>
        <h3>Как записаться?</h3>
        <p>
            Записаться на курсы в нашем учебном центре можно по номеру телефона
            <span>8(351) 277-90-06</span> или по электроной почте <span>dpoprofessional.kurs@gmail.com</span>
        </p>
    </div>

</div>
@endsection
