<?php


class avis{
	private int $id ;
	private int $arcticle_id ;
	private  $userID ;
	private int $user_rating;	
  private string $user_review;
  private int $datetime;	

	public function __construct($arcticle_id,$userID,$user_rating,$user_review){
		$this->arcticle_id = $arcticle_id;

		$this->userID = $userID;
    $this->user_rating = $user_rating;
    $this->user_review = $user_review; 
	}

	public function getId()
	{
		return $this->id;
	}

	public function getarticleID()
	{
		return $this->arcticle_id;
	}
    public function setarticleID(int $arcticle_id)
	{
		$this->arcticle_id = $arcticle_id;
	}
	public function getuserID()
	{
		return $this->userID;
	}
    public function setuserID(int $userID)
	{
		$this->userID = $userID;
	}


	public function getuser_rating()
	{
		return $this->user_rating;
	}
    public function setuser_rating(int $user_rating)
	{
		$this->user_rating = $user_rating;
	}

  public function getuser_review()
	{
		return $this->user_review;
	}


    public function setdatetime(int $datetime)
	{
		$this->datetime = $datetime;
	}
	

}

?>