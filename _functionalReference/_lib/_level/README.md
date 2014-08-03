# Level & XP Tracking

### Functions
- giveXP($userId)
- giveLevel($userId)

- getXpNeededForNextLevel($level)

```
function getXpNeededForNextLevel($level){
    $points_needed = $level * 100;

    if($level > 10){
        $points_needed = $points_needed * 1.2;
    }elseif ($level > 20) {
        $points_needed = $points_needed * 1.6;
    }elseif ($level > 50) {
        $points_needed = $points_needed * 2.1;
    }elseif ($level > 70) {
        $points_needed = $points_needed * 2.8;
    }elseif ($level > 90) {
        $points_needed = $points_needed * 3.0;
    }elseif ($level > 100) {
        $points_needed = $points_needed * 4.2;
    }

    return $points_needed;
}
```

## Permission
Public
