@extends('layouts.home')

@section('content')
  <div class="am-cf am-padding am-padding-bottom-0">
    <div class="am-fl am-cf">
      <strong class="am-text-primary am-text-lg">我的站点</strong> <!-- / <small>Personal information</small> -->
    </div>
  </div>

  <hr data-am-widget="divider" style="" class="am-divider am-divider-default" />
  
  <div class="am-g">
    <div class="am-u-sm-12 am-u-md-6">
      <div class="am-btn-toolbar">
        <div class="am-btn-group am-btn-group-xs">
          <a class="am-btn am-btn-danger" href="{{ url('/add_site/') }}"> 新增 </a>
        </div>
      </div>
    </div>
    <div class="am-u-sm-12 am-u-md-3">
      <div class="am-input-group am-input-group-sm">
        <input type="text" class="am-form-field">
      <span class="am-input-group-btn">
        <button type="button" class="am-btn am-btn-default">搜索</button>
      </span>
      </div>
    </div>
  </div>

  <div class="am-g">
    <div class="am-u-sm-12">
      <form class="am-form">
        <table class="am-table am-table-striped am-table-hover table-main">
          <thead>
          <tr>
            <th class="table-id">ID</th>
            <th class="table-title">网站名称</th>
            <th class="table-type">网站地址</th>
            <th class="table-author am-hide-sm-only">属性状态</th>
            <th class="table-date am-hide-sm-only">提交时间</th>
            <th class="table-set">操作</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($websites as $str)
            <tr>
              <td>{{ $str->web_id}}</td>
              <td>{{ $str->web_name }}</td>
              <td>{{ $str->web_url }}</td>
              <td class="am-hide-sm-only">
                @if ($str->web_status == 1) 黑名单 @endif 
                @if ($str->web_status == 2) 待审核 @endif 
                @if ($str->web_status == 3) 已审核 @endif
              </td>
              <td class="am-hide-sm-only">{{ $str->created_at}}</td>
              <td>
                <div class="am-btn-toolbar">
                  <div class="am-btn-group am-btn-group-xs">
                    <a class="am-btn am-btn-default am-btn-xs am-text-secondary" href="{{ url('/edit_site/'.$str->web_id) }}" >
                      <span class="am-icon-pencil-square-o"></span> 编辑
                    </a>
                  </div>
                </div>
              </td>
            </tr>
            @endforeach

          </tbody>
        </table>
        <div class="am-cf">
          <div class="am-fr">
            {!! $websites->links() !!}
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
