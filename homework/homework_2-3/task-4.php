<?php 

namespace importExport;

$startData = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

// Метод чтения, должен возврашать данные в виде массива
interface Reader 
{
	public function read();
}

// Метод записи, принимает уже обработанный массив, который будет записан
interface Writer 
{
	public function write(array $data);
}

// Метод для конвертации. Конвертирует каждый элемент массива и возвращает результат
interface Converter 
{
	public function convert($item);
}

// Имеет 3 свойства, в которых записываются объекты
class Import
{
	public $reader;
	public $writer;
	public $converters = [];

	// Записывает в свойство объект Reader
	public function from(Reader $reader)
	{
		$this->reader = $reader;
		return $this->reader;
	}

	// Записывает в свойство объект Writer
	public function to(Writer $writer)
	{
		$this->writer = $writer;
		return $this->writer;
	}

	// Записывает в свойство объект Converter
	public function with(Converter $converter) 
	{
		$this->converters[] = $converter;
		return $this->converters;
	}

	// Импортирует данные из свойства reader в writer
	public function execute()
	{
		$arrayReader = $this->reader->read();
		$arrayWriter = [];
		foreach ($arrayReader as $value) {
			foreach ($this->converters as $converter) {
				$arrayWriter[] = $converter->convert($value);
			}
		}
		return $this->writer->write($arrayWriter);
	}
}

class ArrayReader implements Reader
{
	public $array;

	public function __construct(array $array)
	{
		$this->array = $array;
	}
	public function read()
	{
		return $this->array;
	}
}

class FileReader implements Reader 
{
	private $nameFile;

	public function __construct(string $name)
	{
		$this->nameFile = $name;
		$this->read();
	}

	public function read()
	{
		if (file_exists(__DIR__ . '/' . $this->nameFile))
		{
			$file = fopen(__DIR__ . '/' . $this->nameFile, 'r');
			$content = fread($file, filesize($this->nameFile));
			fclose($file);
			return (array) $content;
		}
	}
}

class ArrayWriter implements Writer 
{
	public function write(array $data)
	{
		$resultWrite = $data;
		return $resultWrite;
	}
}

class AddWordConverter implements Converter
{
	public function convert($item)
	{
		$convertItem = $item . ' строчка';
		return $convertItem;
	}
}

class UppercaseConverter implements Converter
{
	public function convert($item)
	{
		$convertItem = mb_strtoupper($item);
		return $convertItem;
	}
}

echo "<p>Первый импорт и экспорт</p>";
$import = new Import();
$import->from(new ArrayReader($startData));
$import->to(new ArrayWriter());
$import->with(new AddWordConverter());
$endData = $import->execute();
var_dump($endData);

echo "<p>Второй импорт и экспорт</p>";
$import2 = new Import();
$import2->from(new FileReader('list.txt'));
$import2->to(new ArrayWriter());
$import2->with(new UppercaseConverter());
$import2->with(new AddWordConverter());
$endData2 = $import2->execute();
var_dump($endData2);