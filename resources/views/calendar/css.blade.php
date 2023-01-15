<style>
    .calendar-wrapper {
        width: 360px;
        margin: 3em auto;
        padding: 2em;
        border: 1px solid #dcdcff;
        border-radius: 5px;
        background: #fff;
    }
    table {
        clear: both;
        width: 100%;
        border: 1px solid #dcdcff;
        border-radius: 3px;
        border-collapse: collapse;
        color: #444;
    }
    td {
        height: 48px;
        text-align: center;
        vertical-align: middle;
        border-right: 1px solid #dcdcff;
        border-top: 1px solid #dcdcff;
        width: 14.28571429%;
    }
    thead td {
        border: none;
        color: #28283b;
        text-transform: uppercase;
        font-size: 1.5em;
    }
    td.not-current {
        color: #c0c0c0;
    }
    td.today {
        font-weight: 700;
        color: #28283b;
        font-size: 1.5em;
    }
    #btnPrev {
        float: left;
        margin-bottom: 20px;
    }
    #btnPrev:before {
        content: '\f104';
        font-family: FontAwesome;
        padding-right: 4px;
    }
    #btnNext {
        float: right;
        margin-bottom: 20px;
    }
    #btnNext:after {
        content: '\f105';
        font-family: FontAwesome;
        padding-left: 4px;
    }
    #btnPrev,
    #btnNext {
        background: transparent;
        border: none;
        outline: none;
        font-size: 1em;
        color: #c0c0c0;
        cursor: pointer;
        font-family: sans-serif;
        text-transform: uppercase;
        transition: all 0.3s ease;
    }
    #btnPrev:hover,
    #btnNext:hover {
        color: #28283b;
        font-weight: bold;
    }
</style>
