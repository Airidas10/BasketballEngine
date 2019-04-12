import random

class Player:
  def __init__(self):
    pass


offense = Player()

offense.first_name = "offense"
offense.last_name = "player"
offense.height = 190 #cm
offense.weight = 81 #kg
offense.age = 27
offense.position = "SG"

#1 - 99

# Athletic
offense.jump = 40
offense.speed = 71
offense.quickness = 81
offense.strength = 49
offense.stamina = 88
offense.hustle = 77
offense.durability = 91

# Rebounding
offense.off_reb = 22
offense.def_reb = 61
offense.boxout = 44

# Defense
offense.help_defense = 55
offense.shot_contest = 44
offense.stealing = 55
offense.blocking = 66
offense.fouling = 44

#Offense
offense.finishing = 66
offense.mid_range_shot = 88
offense.three_point_shot = 90
offense.free_throws = 77
offense.ball_handling = 77
offense.passing = 55
offense.off_ball_movement = 56



defense = Player()

defense.first_name = "defense"
defense.last_name = "player"
defense.height = 190 #cm
defense.weight = 81 #kg
defense.age = 27
defense.position = "SG"

# 1 - 99

#Athletic
defense.jump = 40
defense.speed = 71
defense.quickness = 81
defense.strength = 49
defense.stamina = 88
defense.hustle = 77
defense.durability = 91

# Rebounding
defense.off_reb = 22
defense.def_reb = 61
defense.boxout = 44

# Defense
defense.help_defense = 55
defense.shot_contest = 44
defense.stealing = 55
defense.blocking = 66
defense.fouling = 44

# Offense
defense.finishing = 66
defense.mid_range_shot = 88
defense.three_point_shot = 90
defense.free_throws = 77
defense.ball_handling = 77
defense.passing = 55
defense.off_ball_movement = 56


# TODO: Random for now... Look for advantages/tactics
def decide_attack_option(offense, defense):
    attack_options = ['drive', 'post_up', 'mid_range', 'three_pointer']
    return attack_options[random.randint(0, len(attack_options) - 1)]

# Only gets here if isolating.
def play_one_on_one(offense, defense):
    # Options:
        # Drive to the rim (with pass later)
        # Post up
        # Shoot mid-range off the dribble
        # Shoot a 3 off the dribble

    attack_option = decide_attack_option(offense, defense)

    if(attack_option == 'drive'):
        print("Driving to the rim")

    elif(attack_option == 'post_up'):
        print("Posting up")

    elif(attack_option == 'mid_range'):
        print("Mid range")

    elif(attack_option == 'three_pointer'):
        print("3 pointer")




play_one_on_one(offense, defense)

