import threading, time

class ResumableTimer:
    def __init__(self, timeout, callback):
        self.timeout = timeout
        self.callback = callback
        self.timer = threading.Timer(timeout, callback)
        self.start_time = time.time()
        
    def start(self):
        self.timer.start()

    def pause(self):
        self.timer.cancel()
        self.pause_time = time.time()

    def resume(self):
        self.timer = threading.Timer(self.timeout - (self.pause_time - self.start_time), self.callback)
        self.start()

    def elapsed(self):
        return int(time.time() - self.start_time)

    def get_remaining_time(self):
        return self.timeout - self.elapsed()

def shot_clock_violation():
    print("Shot clock violation!")


attack_length_seconds = 5 #TODO: Change to real value

timer = ResumableTimer(attack_length_seconds, shot_clock_violation)
timer.start()

# timer.pause()
# timer.resume()

for i in range(attack_length_seconds):
    time.sleep(1)
    remaining_time = timer.get_remaining_time()
    if remaining_time > 0:
        print("Remaining: ", remaining_time, " seconds")
