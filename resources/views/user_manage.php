  <form id="frmSaveCookie" action="" method="post">
    <h1>Users manage</h1>
    <br/>

    <?php if (count($listUser) == 0) { ?>
        <p>No user data.</p>
    <?php } else { ?>
      <table class="table table-hover" style="border: transparent;">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Account</th>
            <th scope="col">Full name</th>
            <th scope="col">Birthday</th>
            <th scope="col">Email</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
            <?php echo $listUserTable; ?>
        </tbody>
      </table>
    <?php } ?>
  </form>
