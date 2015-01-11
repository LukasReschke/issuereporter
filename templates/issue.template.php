### Steps to reproduce
<?php print_unescaped($_['stepsToReproduce']) ?>


### Expected behaviour
<?php print_unescaped($_['expectedBehaviour']) ?>


### Actual behaviour
<?php print_unescaped($_['actualBehaviour']) ?>


### Server configuration

**Operating system**: <?php print_unescaped($_['serverOs']) ?>


**Web server:** <?php print_unescaped($_['webserver']) ?>


**Database:** <?php print_unescaped($_['database']) ?>


**PHP version:** <?php print_unescaped($_['phpVersion']) ?>


**ownCloud version:** <?php print_unescaped($_['ownCloudVersion']) ?>


**Updated from an older ownCloud or fresh install:** <?php print_unescaped($_['installStory']) ?>


**List of activated apps:**
<?php print_unescaped($_['enabledApps']) ?>


**List of disabled apps:**
<?php print_unescaped($_['disabledApps']) ?>


**The content of config/config.php:**

```json
<?php print_unescaped($_['configFile']."\n") ?>

```

**Are you using external storage, if yes which one:** <?php print_unescaped($_['externalStorage']) ?>

### Client configuration
**Browser:** <?php print_unescaped($_['browser']) ?>

**Operating system:** <?php print_unescaped($_['clientOS']) ?>

### Logs
#### Web server error log
```
<?php print_unescaped($_['webLogs']) ?>

```

#### ownCloud log (data/owncloud.log)
```json
<?php print_unescaped($_['owncloudLog']) ?>

```

#### Browser log
```
<?php print_unescaped($_['browserLog']) ?>

```