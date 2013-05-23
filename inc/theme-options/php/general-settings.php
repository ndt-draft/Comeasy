<?php 
/* GENERAL SETTINGS */
?>
<div id="of-option-general" class="theme-option">
    
    <h3>Logo Setting</h3>

    <table class="form-table">
        <tr>
            <th><label for="adribbon-logo">Logo</label></th>
            <td>
                <input type="text" value="<?php echo $options['adribbon-logo']; ?>" id="adribbon-logo" 
                    name="adribbon-logo" class="regular-text" placeholder="Get link of logo image and paste in here">
            </td>
        </tr>

        <tr>
            <th><label for="adribbon-favicon">Favicon</label></th>
            <td>
                <input type="text" value="<?php echo $options['adribbon-favicon']; ?>" id="adribbon-favicon" 
                    name="adribbon-favicon" class="regular-text" placeholder="Get link of favicon image and paste in here">
            </td>
        </tr>
    </table>

    <h3>Google Analytics</h3>

    <table class="form-table">

        <tr>
            <th><label for="adribbon-google-analytics">Google Analytics Code</label></th>
            <td>
                <textarea id="adribbon-google-analytics" name="adribbon-google-analytics" rows="5" cols="100"><?php echo stripslashes($options['adribbon-google-analytics']); ?></textarea>
            </td>
        </tr>
    </table>

</div> <!-- end of-option-general-tab -->