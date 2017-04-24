<?php
defined('_JEXEC') or die('Restricted access');
//jimport('joomla.application.component.modellist');

class FgbusupportModelInfo extends JModelList{

	public function __construct($config = array())
	{
		parent::__construct($config);
	}
	public function getItems()
	{
		$items	= array();
		$items[] = (object) array (
						'date'			=> 'В планах на доработку',
						'description'	=> '(ADM) Отображение начало текста обращения; (SITE) Выключение прикрепление и скачивание файла',
					);
		$items[] = (object) array (
						'date'			=> '2017-04-22',
						'description'	=> '(SITE) Прикрепление файлов к обращению; (SITE) Скачивание файла в обращении; (SITE) Обновление статуса и даты (локального) при детальном просмотре обращения; (SITE) Дата завершения в ответе на обращение;(SITE) Прикрепление файлов к уточнению обращения;(ADM) Отображение кол-ва заявок в статусах;(ADM) Прямой переход с вопроса на УЦ на вопрос суппорта;(ADM) Фильтрация обращений;',
					);
		$items[] = (object) array (
						'date'			=> '2017-04-17',
						'description'	=> 'Первый релиз',
					);
		return $items;
	}
	
}