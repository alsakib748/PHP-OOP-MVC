<div class="login-content">
    Login
    <hr />

    <div class="loginform">
        <form action="<?= BASE_URL; ?>/Login/loginAuth" method="POST">
            <table>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" placeholder="username"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" placeholder="password" /></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" /></td>
                </tr>
            </table>
        </form>
    </div>
</div>