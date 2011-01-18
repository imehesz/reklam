<?php

/**
 * This is the model class for table "schedule".
 *
 * The followings are the available columns in table 'schedule':
 * @property integer $score
 * @property integer $created_at
 * @property string $domain
 * @property integer $enddate
 * @property string $goto_link
 * @property integer $id
 * @property string $image
 * @property integer $startdate
 * @property string $title
 */
class Schedule extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Schedule the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'schedule';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array( 'domain,image', 'required' ),
			array('score, created_at, enddate, startdate', 'numerical', 'integerOnly'=>true),
			array('domain', 'length', 'max'=>100),
			array('goto_link, image, title', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('score, created_at, domain, enddate, goto_link, id, image, startdate, title', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'score' => 'Score',
			'created_at' => 'Created At',
			'domain' => 'Domain',
			'enddate' => 'Enddate',
			'goto_link' => 'Goto Link',
			'id' => 'ID',
			'image' => 'Image',
			'startdate' => 'Startdate',
			'title' => 'Title',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('score',$this->score);
		$criteria->compare('created_at',$this->created_at);
		$criteria->compare('domain',$this->domain,true);
		$criteria->compare('enddate',$this->enddate);
		$criteria->compare('goto_link',$this->goto_link,true);
		$criteria->compare('id',$this->id);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('startdate',$this->startdate);
		$criteria->compare('title',$this->title,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}


    public function beforeValidate()
    {
        parent::beforeValidate();

        $this->startdate    = strtotime( $this->startdate . ' 01:00:00' );
        $this->enddate      = strtotime( $this->enddate . ' 01:00:00' );
        if( $this->isNewRecord )
        {
            $this->created_at = time();
        }

        return true;
    }
}
