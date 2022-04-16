<?php
return '<p>Test</p>';
/* '<form action="vendor/Create_menucell.php" method="post">
    <input style="display: none;" type="number" value="" id="id" name="idc">
    <table class="menu">
        <caption>choose day and time</caption>
        <thead>
            <tr>
                <th></th>
                <th>mn</th>
                <th>ts</th>
                <th>wd</th>
                <th>th</th>
                <th>fr</th>
                <th>st</th>
                <th>sn</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>Br</th>
                <td class="daymenu"><input type="checkbox" name="monday[]" value="breakfast" class="tgl tgl-flip" id="bm"><label class="tgl-btn" for="bm"></label></td>
                <td class="daymenu"><input type="checkbox" name="tuesday[]" value="breakfast" class="tgl tgl-flip" id="bt"><label class="tgl-btn" for="bt"></label></td>
                <td class="daymenu"><input type="checkbox" name="wednesday[]" value="breakfast" class="tgl tgl-flip" id="bw"><label class="tgl-btn" for="bw"></label></td>
                <td class="daymenu"><input type="checkbox" name="thursday[]" value="breakfast" class="tgl tgl-flip" id="bth"><label class="tgl-btn" for="bth"></label></td>
                <td class="daymenu"><input type="checkbox" name="friday[]" value="breakfast" class="tgl tgl-flip" id="bf"><label class="tgl-btn" for="bf"></label></td>
                <td class="daymenu"><input type="checkbox" name="saturday[]" value="breakfast" class="tgl tgl-flip" id="bst"><label class="tgl-btn" for="bst"></label></td>
                <td class="daymenu"><input type="checkbox" name="sunday[]" value="breakfast" class="tgl tgl-flip" id="bsn"><label class="tgl-btn" for="bsn"></label></td>
            </tr>
            <tr>
                <th>Sn1</th>
                <td class="daymenu"><input type="checkbox" name="monday[]" value="snack(1)" class="tgl tgl-flip" id="s1m"><label class="tgl-btn" for="s1m"></label></td>
                <td class="daymenu"><input type="checkbox" name="tuesday[]" value="snack(1)" class="tgl tgl-flip" id="s1t"><label class="tgl-btn" for="s1t"></label></td>
                <td class="daymenu"><input type="checkbox" name="wednesday[]" value="snack(1)" class="tgl tgl-flip" id="s1w"><label class="tgl-btn" for="s1w"></label></td>
                <td class="daymenu"><input type="checkbox" name="thursday[]" value="snack(1)" class="tgl tgl-flip" id="s1th"><label class="tgl-btn" for="s1th"></label></td>
                <td class="daymenu"><input type="checkbox" name="friday[]" value="snack(1)" class="tgl tgl-flip" id="s1f"><label class="tgl-btn" for="s1f"></label></td>
                <td class="daymenu"><input type="checkbox" name="saturday[]" value="snack(1)" class="tgl tgl-flip" id="s1st"><label class="tgl-btn" for="s1st"></label></td>
                <td class="daymenu"><input type="checkbox" name="sunday[]" value="snack(1)" class="tgl tgl-flip" id="s1sn"><label class="tgl-btn" for="s1sn"></label></td>
            </tr>
            <tr>
                <th>Ln</th>
                <td class="daymenu"><input type="checkbox" name="monday[]" value="lunch" class="tgl tgl-flip" id="lm"><label class="tgl-btn" for="lm"></label></td>
                <td class="daymenu"><input type="checkbox" name="tuesday[]" value="lunch" class="tgl tgl-flip" id="lt"><label class="tgl-btn" for="lt"></label></td>
                <td class="daymenu"><input type="checkbox" name="wednesday[]" value="lunch" class="tgl tgl-flip" id="lw"><label class="tgl-btn" for="lw"></label></td>
                <td class="daymenu"><input type="checkbox" name="thursday[]" value="lunch" class="tgl tgl-flip" id="lth"><label class="tgl-btn" for="lth"></label></td>
                <td class="daymenu"><input type="checkbox" name="friday[]" value="lunch" class="tgl tgl-flip" id="lf"><label class="tgl-btn" for="lf"></label></td>
                <td class="daymenu"><input type="checkbox" name="saturday[]" value="lunch" class="tgl tgl-flip" id="lst"><label class="tgl-btn" for="lst"></label></td>
                <td class="daymenu"><input type="checkbox" name="sunday[]" value="lunch" class="tgl tgl-flip" id="lsn"><label class="tgl-btn" for="lsn"></label></td>
            </tr>
            <tr>
                <th>Sn2</th>
                <td class="daymenu"><input type="checkbox" name="monday[]" value="snack(2)" class="tgl tgl-flip" id="s2m"><label class="tgl-btn" for="s2m"></label></td>
                <td class="daymenu"><input type="checkbox" name="tuesday[]" value="snack(2)" class="tgl tgl-flip" id="s2t"><label class="tgl-btn" for="s2t"></label></td>
                <td class="daymenu"><input type="checkbox" name="wednesday[]" value="snack(2)" class="tgl tgl-flip" id="s2w"><label class="tgl-btn" for="s2w"></label></td>
                <td class="daymenu"><input type="checkbox" name="thursday[]" value="snack(2)" class="tgl tgl-flip" id="s2th"><label class="tgl-btn" for="s2th"></label></td>
                <td class="daymenu"><input type="checkbox" name="friday[]" value="snack(2)" class="tgl tgl-flip" id="s2f"><label class="tgl-btn" for="s2f"></label></td>
                <td class="daymenu"><input type="checkbox" name="saturday[]" value="snack(2)" class="tgl tgl-flip" id="s2st"><label class="tgl-btn" for="s2st"></label></td>
                <td class="daymenu"><input type="checkbox" name="sunday[]" value="snack(2)" class="tgl tgl-flip" id="s2sn"><label class="tgl-btn" for="s2sn"></label></td>
            </tr>
            <tr>
                <th>Dn</th>
                <td class="daymenu"><input type="checkbox" name="monday[]" value="dinner" class="tgl tgl-flip" id="dm"><label class="tgl-btn" for="dm"></label></td>
                <td class="daymenu"><input type="checkbox" name="tuesday[]" value="dinner" class="tgl tgl-flip" id="dt"><label class="tgl-btn" for="dt"></label></td>
                <td class="daymenu"><input type="checkbox" name="wednesday[]" value="dinner" class="tgl tgl-flip" id="dw"><label class="tgl-btn" for="dw"></label></td>
                <td class="daymenu"><input type="checkbox" name="thursday[]" value="dinner" class="tgl tgl-flip" id="dth"><label class="tgl-btn" for="dth"></label></td>
                <td class="daymenu"><input type="checkbox" name="friday[]" value="dinner" class="tgl tgl-flip" id="df"><label class="tgl-btn" for="df"></label></td>
                <td class="daymenu"><input type="checkbox" name="saturday[]" value="dinner" class="tgl tgl-flip" id="dst"><label class="tgl-btn" for="dst"></label></td>
                <td class="daymenu"><input type="checkbox" name="sunday[]" value="dinner" class="tgl tgl-flip" id="dsn"><label class="tgl-btn" for="dsn"></label></td>
            </tr>
        </tbody>
    </table>
    <button type="submit">Add dish</button>
</form>';*/