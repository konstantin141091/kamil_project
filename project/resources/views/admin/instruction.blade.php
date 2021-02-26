@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Инструкция админов для работы с базой сайта.</h2>
        <p>Для загрузки в реестр записей с помощью таблицы Excel нужно соблюдать следующие правила:</p>
        <p>1. В файле Excel не должно быть пустых строк</p>
        <p>2. В файле Excel не должно быть название полей</p>
        <p>3. В файле Excel есть поля обязательные для заполнения(протокол, имя, фамилия, отчество)</p>
        <p>4. В файле Excel есть поля, значения в которых уникальны(протокол, свидетельство, удостоверение)</p>
        <p>5. При загрузке и выгрузке файла Excel, поля находятся в определенной последовательности и она должна соблюдаться</p>
        <table class="border">
            <tr class="border-bottom">
                <td class="border-right">Протокол</td>
                <td class="border-right">Фамилия</td>
                <td class="border-right">Имя</td>
                <td class="border-right">Отчество</td>
                <td class="border-right">Разряд</td>
                <td class="border-right">Свидетельство</td>
                <td class="border-right">Удостоверение</td>
                <td class="border-right">Дата окончания обучения</td>
                <td class="border-right">Заказчик</td>
                <td class="border-right">Источник</td>
                <td class="border-right">Адресс</td>
                <td class="border-right">Телефон</td>
                <td class="border-right">Сумма</td>
                <td>Комментарий</td>
            </tr>
            <tr>
                <td class="border-right">Уникаьное значение. Обязательно.</td>
                <td class="border-right">Обязательно.</td>
                <td class="border-right">Обязательно.</td>
                <td class="border-right">Обязательно.</td>
                <td class="border-right">Может быть пустым.</td>
                <td class="border-right">Уникаьное значение. Может быть пустым.</td>
                <td class="border-right">Уникаьное значение. Может быть пустым.</td>
                <td class="border-right">Может быть пустым.</td>
                <td class="border-right">Может быть пустым.</td>
                <td class="border-right">Может быть пустым.</td>
                <td class="border-right">Может быть пустым.</td>
                <td class="border-right">Может быть пустым.</td>
                <td class="border-right">Может быть пустым.</td>
                <td>Может быть пустым.</td>
            </tr>
        </table>

        <div class="m-4">
            <h2>Пример правильного Excel файла.</h2>
            <img src="{{ asset("storage/images/instruction_example.jpg") }}" alt="Пример файла Excel">
        </div>
        <div class="m-4">
            <h2>Пример неправильного Excel файла</h2>
            <img src="{{ asset("storage/images/instruction_example2.jpg") }}" alt="Пример файла Excel">
            <p>Перед загрузкой не убрали название полей.</p>
            <p>Перед загрузкой не удалили пустые строки.</p>
        </div>
        <div>
            <h2>Служебная информация.</h2>
            <p>Адресс репозитория: <a href="https://github.com/konstantin141091/kamil_project">https://github.com/konstantin141091/kamil_project</a></p>
            <p>Проект может дорабатываться. Для этого всегда можно обратиться к его автору по почте <span style="color: brown">konstantin.sudakov@bk.ru</span> или к другому программисту</p>
        </div>

    </div>
@endsection
