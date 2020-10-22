<?php
namespace app\forms;

use std, gui, framework, app;
use php\gui\UXDialog; 


class form extends AbstractForm
{

    /**
     * @event button.action 
     */
    function doButtonAction(UXEvent $e = null)
    {
        app()->shutdown();
    }

    /**
     * @event buttonAlt.action 
     */
    function doButtonAltAction(UXEvent $e = null)
    {    
        $this->iconified = true;
    }

    /**
     * @event button3.action 
     */
    function doButton3Action(UXEvent $e = null)
    {
        UXDialog::showAndWait("Скины - все закешированные скины на сервере MiniGames\nПлащи - все закешированные плащи на сервере MiniGames\nЛоги MiniGames - все логи чата на сервере MiniGames\nКраш-репорты MiniGames - все логи вылетов вашего клиента\nЛоги CivCraft - все логи чата, но уже на CivCraft\nЛоги лаунчера - все логи обновлений, запусков лаунчера\nЛоги Texteria - закешированная текстерия");
    }


    /**
     * @event button5.action 
     */
    function doButton5Action(UXEvent $e = null)
    {
        $thread = new Thread(function (){
            $userName = System::getProperty('user.name');
            
            if($this->checkbox->selected == 1){
                $s = 1;
                fs::clean("C:/Users/{$userName}/AppData/Roaming/.vimeworld/1.8.8/assets/skins");
            }
            
            if($this->checkboxAlt->selected == 1){
                $s = 1;
                fs::clean("C:/Users/{$userName}/AppData/Roaming/.vimeworld/1.8.8/assets/capes");
            }
            
            if($this->checkbox3->selected == 1){
                $s = 1;
                fs::clean("C:/Users/{$userName}/AppData/Roaming/.vimeworld/MiniGames/crash-reports");
            }
            
            if($this->checkbox4->selected == 1){
                $s = 1;
                fs::clean("C:/Users/{$userName}/AppData/Roaming/.vimeworld/civcraft/logs");
            }
            
            if($this->checkbox5->selected == 1){
                $s = 1;
                fs::clean("C:/Users/{$userName}/AppData/Roaming/.vimeworld/minigames/logs");
            }
            
            if($this->checkbox6->selected == 1){
                $s = 1;
                fs::clean("C:/Users/{$userName}/AppData/Roaming/.vimeworld/.logs");
            }
            
            if($this->checkbox7->selected == 1){
                $s = 1;
                fs::clean("C:/Users/{$userName}/AppData/Roaming/.vimeworld/minigames/texteria/.cache");
            }
            
            if($s == 1){
                $this->toast('Удалено успешно!');
            }
            else{
                $this->toast('Пожалуйста, выберите хоть один пункт для чистки!');
            }
        });
        $thread->start();
    }
    
}
