<?php


use Note\Note;

$adminLatestMails = Note::latestNotifications('admin', false);
$adminAllMails = Note::allNotifications('admin', false);
?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Folders</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body p-0">
        <ul class="nav nav-pills flex-column">
            <li class="nav-item active">
                <a href="{{ route('admin.latest.mailbox') }}" class="nav-link">
                    <i class="fa fa-mail-forward"></i> Inbox
                    <span class="badge bg-danger float-right">{{ number_format(count($adminLatestMails)) }}</span>
                </a>
            </li>
            <li class="nav-item active">
                <a href="{{ route('admin.all.mailbox') }}" class="nav-link">
                    <i class="fa fa-inbox"></i> All
                    <span class="badge bg-success float-right">{{ number_format(count($adminAllMails)) }}</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- /.card-body -->
</div>
